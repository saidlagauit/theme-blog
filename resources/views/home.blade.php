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

        <div class="posts bg-body-tertiary p-2 my-3">
            <h2>Featured Articles</h2>
            <div class="list-post">
                @foreach ($mostViewed as $post)
                    <div class="post border-bottom-0 border">
                        <a href="{{ route('blog.single-blog', $post->slug) }}">
                            <p class="m-0">{{ $post->title }}</p><span>{{ $post->created_at->format('F d, Y') }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="contact bg-body-tertiary p-2 my-3">

            <h2>Write us a message.</h2>
            <form action="{{ route('contact.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="full_name">Full name *</label>
                            <input type="text" id="full_name" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}">
                            @error('full_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail address *</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone number *</label>
                            <input type="tel" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="message">Your message *</label>
                            <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="5">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-grid gap-2 mt-1">
                            <button type="submit" class="btn btn-dark">Send message</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection
