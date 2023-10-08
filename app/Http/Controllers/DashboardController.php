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

        return view('auth.posts.dashboard', compact('totalPosts', 'totalComments', 'totalMessages'));
    }
}
