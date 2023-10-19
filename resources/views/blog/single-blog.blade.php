@extends('layouts.app')

@section('title', $post->title . ' | Blog Theme')
@section('meta_description', $post->meta_description)
@section('keywords', $post->keywords)

@section('content')
    <div class="single-blog">
        <div class="row g-3">
            <div class="col-md-8">
                @auth
                    <div class="single-blog-action text-bg-warning">
                        <a href="{{ route('auth.posts.edit', ['id' => $post->id]) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form method="POST" action="{{ route('auth.posts.destroy', ['id' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                @endauth

                <img src="{{ asset('storage/' . $post->imgCover) }}" alt="{{ $post->title }}" class="single-blog-cover" title="{{ $post->title }}">
                <h2 class="single-blog-title">{{ $post->title }}</h2>
                <span class="text-muted">Premiered on {{ $post->created_at->format('F d, Y') }}</span>
                <div class="single-blog-content">{!! Parsedown::instance()->text($post->content) !!}</div>
                
                <div class="comments bg-body-tertiary rounded">
                    <h2>Comments</h2>
                    <ul class="list-unstyled">
                        @foreach ($post->comments as $comment)
                            <li class="mb-3">
                                @if ($comment->approved == 1)
                                    <div class="comment border rounded">
                                        <p>{{ $comment->comment }}</p>
                                        <p>{{ $comment->name }} <span class="text-muted">Posted on {{ $comment->created_at->format('F d, Y') }}</span></p>
                                    </div>
                                    <ul class="list-unstyled ms-4">
                                        @foreach ($comment->replies as $reply)
                                            <li class=" mt-2">
                                                <div class="reply border border-top-0">
                                                    <p>{{ $reply->reply_content }}</p>
                                                    <p>Admin <span class="text-muted">Posted on {{ $reply->created_at->format('F d, Y') }}</span></p>
                                                    @auth
                                                        <form method="POST" action="{{ route('replies.destroy', [$comment->id, $reply->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    @endauth
                                                </div>
                                            </li>
                                        @endforeach
                                        @auth
                                            <form method="POST" action="{{ route('replies.store', $comment->id) }}">
                                                @csrf
                                                <div class="input-group my-2">
                                                    <input type="text" name="reply_content" class="form-control @error('reply_content') is-invalid @enderror" placeholder="Write a public reply…">
                                                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
                                                </div>
                                                @error('reply_content')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </form>
                                        @endauth
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    @guest
                        <h2>Leave a Reply</h2>
                        <form method="POST" action="{{ route('comments.store') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="hidden" name="approved" value="0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Comment">Comment *</label>
                                        <textarea class="form-control @error('comment') is-invalid @enderror" id="Comment" name="comment" rows="4">{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary my-2">Post Comment</button>
                        </form>
                    @endguest
                </div>
                @if ($previousPost || $nextPost)
                    <div class="post-navigation bg-body-tertiary my-2">
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
            <div class="col-md-4">
                <div class="about-me bg-body-tertiary rounded">
                    <h2>About Me</h2>
                    <strong>{{ $me->name }}</strong>
                    <p>{{ $me->bio }}</p>
                    <div class="about-me-contact">
                        <a class="text-bg-dark p-2 rounded" href="https://x.com/{{ $me->link_twitter }}" target="_blank" aria-label="{{ $me->name }} On Twitter"><i class="fa-brands fa-x-twitter"></i></a>
                        <a class="text-bg-dark p-2 rounded" href="https://github.com/{{ $me->link_github }}" target="_blank" aria-label="{{ $me->name }} On Github"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
