@extends('layouts.app')

@section('title', 'Blog Theme | Add New Post')
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="create min-width">
        <form method="POST" action="{{ route('auth.posts.create') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class="form-group">
                <label for="imgCover">Image Cover</label>
                <input type="file" class="form-control @error('imgCover') is-invalid @enderror" id="imgCover"
                    name="imgCover" accept="image/*">
                @error('imgCover')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="meta_description">Description</label>
                <textarea id="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                    name="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                <p class="form-text text-muted"><span id="char-count">0</span>/160 characters</p>
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" id="keywords" class="form-control @error('keywords') is-invalid @enderror"
                    name="keywords" value="{{ old('keywords') }}">
                @error('keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>

@endsection
