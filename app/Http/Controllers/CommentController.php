<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index(Post $post)
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('auth.posts.comments', compact('comments'));
    }

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

    public function update(Comment $comment)
    {
        if (!$comment->approved) {
            $comment->update(['approved' => true]);

            return redirect()->back()->with('success', 'Comment approved successfully.');
        }

        return redirect()->back()->with('info', 'Comment is already approved.');
    }

    public function unapprove(Comment $comment)
    {
        if ($comment->approved) {
            $comment->update(['approved' => false]);

            return redirect()->back()->with('success', 'Comment unapproved successfully.');
        }

        return redirect()->back()->with('info', 'Comment is already unapproved.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
