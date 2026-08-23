<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store contact message from public portfolio.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);

        Message::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'is_read' => false,
        ]);

        return back()->with(
            'success',
            'Message sent successfully!'
        );
    }

    /**
     * Display messages in dashboard.
     */
    public function index()
    {
        $messages = Message::latest()->paginate(15);

        return view(
            'messages.messages',
            compact('messages')
        );
    }

    /**
     * Mark message as read.
     */
    public function markAsRead(Message $message)
    {
        $message->update([
            'is_read' => true,
        ]);

        return back()->with(
            'success',
            'Message marked as read.'
        );
    }

    /**
     * Delete message.
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return back()->with(
            'success',
            'Message deleted.'
        );
    }
}
