<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $portfolios = Portfolio::orderBy('order')->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'pdf_file' => 'required|file|mimes:pdf|max:10240',
            'logo_file' => 'nullable|image|max:2048',
            'order' => 'integer|min:0',
            'active' => 'boolean',
        ]);

        $pdf_path = $request->file('pdf_file')->store('public/portfolios/pdfs');
        $pdf_path = str_replace('public/', 'storage/', $pdf_path);

        $logo_path = null;
        if ($request->hasFile('logo_file')) {
            $logo_path = $request->file('logo_file')->store('public/portfolios/logos');
            $logo_path = str_replace('public/', 'storage/', $logo_path);
        }

        Portfolio::create([
            'title' => $validated['title'],
            'pdf_path' => $pdf_path,
            'logo_path' => $logo_path,
            'order' => $validated['order'] ?? 0,
            'active' => $validated['active'] ?? true,
        ]);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio created successfully');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'logo_file' => 'nullable|image|max:2048',
            'order' => 'integer|min:0',
            'active' => 'boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'order' => $validated['order'] ?? $portfolio->order,
            'active' => $validated['active'] ?? $portfolio->active,
        ];

        if ($request->hasFile('pdf_file')) {
            // Delete old file
            if (str_starts_with($portfolio->pdf_path, 'storage/')) {
                $old_path = str_replace('storage/', 'public/', $portfolio->pdf_path);
                Storage::delete($old_path);
            }

            $pdf_path = $request->file('pdf_file')->store('public/portfolios/pdfs');
            $data['pdf_path'] = str_replace('public/', 'storage/', $pdf_path);
        }

        if ($request->hasFile('logo_file')) {
            // Delete old file
            if ($portfolio->logo_path && str_starts_with($portfolio->logo_path, 'storage/')) {
                $old_path = str_replace('storage/', 'public/', $portfolio->logo_path);
                Storage::delete($old_path);
            }

            $logo_path = $request->file('logo_file')->store('public/portfolios/logos');
            $data['logo_path'] = str_replace('public/', 'storage/', $logo_path);
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio updated successfully');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Delete files
        if (str_starts_with($portfolio->pdf_path, 'storage/')) {
            $pdf_path = str_replace('storage/', 'public/', $portfolio->pdf_path);
            Storage::delete($pdf_path);
        }

        if ($portfolio->logo_path && str_starts_with($portfolio->logo_path, 'storage/')) {
            $logo_path = str_replace('storage/', 'public/', $portfolio->logo_path);
            Storage::delete($logo_path);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')->with('success', 'Portfolio deleted successfully');
    }
}