<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::where('active', true)
            ->orderBy('order')
            ->get();

        $settings = Setting::all()->pluck('value', 'key')->toArray();

        return view('home', compact('portfolios', 'settings'));
    }
}