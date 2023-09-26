@extends('layouts.app')

@section('title', $post->title)
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

        <div class="comments bg-body-tertiary rounded">

            <h2>Comments</h2>
            <ul class="list-unstyled">
                @foreach ($post->comments as $comment)
                    <li class="mb-4">
                        @if ($comment->approved == 1)
                            <div class="comment border rounded">
                                <p>{{ $comment->comment }}</p>
                                <p>{{ $comment->name }} <span class="text-muted">Posted on {{ $comment->created_at->format('F d, Y') }}</span>
                                </p>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            <h2>Leave a Reply</h2>
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf

                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="approved" value="0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Comment">Comment <span class="text-danger">*</span> </label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="Comment" name="comment" rows="4">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span> </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary my-2">Post Comment</button>
            </form>

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
