<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('auth.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('auth.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:160',
            'keywords' => 'required|string',
            'imgCover' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'content' => 'required|string',
        ]);

        $imgPath = null;
        if ($request->hasFile('imgCover')) {
            $imgPath = $request->file('imgCover')->store('uploads', 'public');
        }

        $post = new Post([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'meta_description' => $request->input('meta_description'),
            'keywords' => $request->input('keywords'),
            'imgCover' => $imgPath,
            'content' => $request->input('content'),
        ]);

        $post->save();

        return redirect()->route('auth.posts.create')->with('success', 'Post created successfully');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $approvedComments = $post->comments()->where('approved', true)->get();

        $previousPost = Post::where('created_at', '<', $post->created_at)->orderBy('created_at', 'desc')->first();
        $nextPost = Post::where('created_at', '>', $post->created_at)->orderBy('created_at', 'asc')->first();

        return view('blog.single-blog', compact('post', 'approvedComments', 'previousPost', 'nextPost'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('auth.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'imgCover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string',
            'meta_description' => 'required|string|max:160',
            'keywords' => 'required|string',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);

        $post->update($validatedData);

        if ($request->hasFile('imgCover')) {
            $imagePath = $request->file('imgCover')->store('uploads');
            $post->imgCover = $imagePath;
            $post->save();
        }

        return redirect()->back()->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully');
    }
}
