<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function dash()
    {
        $totalPosts = Post::count();
        $totalComments = Comment::count();
        $totalMessages = Contact::count();

        // $lastComments = Comment::orderBy('created_at', 'desc')->take(5)->get();
        // $lastMessages = Contact::orderBy('created_at', 'desc')->take(5)->get();

        return view('auth.dash.dashboard', compact('totalPosts', 'totalComments', 'totalMessages'));
    }
}
