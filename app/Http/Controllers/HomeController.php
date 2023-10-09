<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        $latestPosts = Post::orderBy('created_at', 'desc')->take(30)->get();

        $data = [
            'title' => "Hi, my name is Said Lagauit",
            'disc' => "I'm a back-end developer and I love to build things.",
            'meta_description' => "",
            'keywords' => "",
            'mostViewed' => $latestPosts,
        ];

        return view('home', $data);
    }
}
