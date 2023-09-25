@extends('layouts.app')

@section('title', 'Blog Theme | ' . $post->title)
@section('meta_description', $post->meta_description)
@section('keywords', $post->keywords)

@section('content')
    <div class="single-blog min-width">

        @auth

            <div class="single-blog-action text-bg-warning">
                <a href="{{ route('auth.posts.edit', ['id' => $post->id]) }}" class="btn btn-success">Edit</a>
                <form method="POST" action="{{ route('auth.posts.destroy', ['id' => $post->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>

            </div>

        @endauth

        <img src="{{ asset('storage/' . $post->imgCover) }}" alt="{{ $post->title }}" class="single-blog-cover" title="{{ $post->title }}">

        <h2 class="single-blog-title">{{ $post->title }}</h2>

        <span class="text-muted">Published {{ $post->created_at->format('F d, Y') }}</span>

        <div class="single-blog-content">
            {!! Parsedown::instance()->text($post->content) !!}
        </div>

        @if ($previousPost || $nextPost)
            <div class="post-navigation my-3">
                @if ($previousPost)
                    <div class="previous-post">
                        <span>Previous Post:</span>
                        <a href="{{ route('blog.single-blog', $previousPost->slug) }}">{{ $previousPost->title }}</a>
                    </div>
                @endif

                @if ($nextPost)
                    <div class="next-post">
                        <span>Next Post:</span>
                        <a href="{{ route('blog.single-blog', $nextPost->slug) }}">{{ $nextPost->title }}</a>
                    </div>
                @endif
            </div>
        @endif

    </div>
@endsection
