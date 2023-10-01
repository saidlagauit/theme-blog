@extends('layouts.app')

@section('title', 'Blog Theme | Writing')
@section('meta_description', $meta_description)
@section('keywords', $keywords)

@section('content')
    <div class="home">

        <div class="cover">
            <h1 class="cover-title text-capitalize">{{ $title }}</h1>
            <p class="cover-disc">{{ $disc }}</p>
        </div>

        <div class="posts bg-body-tertiary my-3">
            <div class="list-post">
                @foreach ($mostViewed as $post)
                    <div class="post border-bottom-0 border">
                        <a href="{{ route('blog.single-blog', $post->slug) }}"
                            class="d-flex justify-content-between align-items-center">
                            <p class="m-0">{{ $post->title }}</p>
                            <span>{{ $post->created_at->format('F d, Y') }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
