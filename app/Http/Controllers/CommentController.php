<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_id' => 'required|exists:posts,id',
            'name' => 'required|string',
            'email' => 'required|string|email',
            'comment' => 'required|string',
            'approved' => 'required|string'
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'approved' => $request->approved,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }
}
