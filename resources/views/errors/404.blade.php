@extends('layouts.app')

@section('title', 'Blog Theme | 404 - Page Not Found')
@section('meta_description', '')
@section('keywords', '')

@section('content')
    <div class="notfound">
        <h1>404 - Page Not Found</h1>
        <p>The page you are looking for could not be found.</p>
        <a class="btn btn-primary" href="{{ route('home') }}">Back to home</a>
    </div>
@endsection
