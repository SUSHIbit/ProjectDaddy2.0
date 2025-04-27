<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the messages.
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        $unreadCount = Message::unread()->count();
        
        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    /**
     * Display the specified message.
     */
    public function show(Message $message)
    {
        // Mark message as read if it hasn't been read yet
        if (!$message->isRead()) {
            $message->markAsRead();
        }
        
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Mark a message as read.
     */
    public function markAsRead(Message $message)
    {
        $message->markAsRead();
        
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message marked as read.');
    }

    /**
     * Delete the specified message.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        
        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}