@extends('layouts.app')

@section('title', 'Blog Theme | Edit')
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="edit-post">
        <form method="POST" action="{{ route('auth.posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $post->imgCover) }}" alt="{{ $post->title }}" class="w-100"
                        title="{{ $post->title }}">
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="imgCover">Image Cover</label>
                        <input type="file" class="form-control" id="imgCover" name="imgCover" accept="image/*">

                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="meta_description">Description</label>
                        <textarea id="meta_description" class="form-control" name="meta_description" rows="2">{{ $post->meta_description }}</textarea>
                        <p class="form-text text-muted"><span id="char-count">0</span>/160 characters</p>
                    </div>

                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" id="keywords" class="form-control" name="keywords" value="{{ $post->keywords }}">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="10">{{ $post->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </div>

        </form>
    </div>

@endsection
