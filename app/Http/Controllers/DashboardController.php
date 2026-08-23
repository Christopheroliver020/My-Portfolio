<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Message;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPosts = Post::count();

        $totalMessages = Message::count();

        $unreadMessages = Message::where(
            'is_read',
            false
        )->count();

        $totalVisitors = Visitor::count();

        return view('dashboard', compact(
            'totalPosts',
            'totalMessages',
            'unreadMessages',
            'totalVisitors'
        ));
    }
}
