@extends('layouts.app')

@section('content')
    <div class="dashboard d-flex">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="{{ route('auth.posts.create') }}">New Post</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('auth.posts.index') }}">Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('auth.posts.comments') }}">Comments</a></li>

        </ul>
        <div class="main w-100">
            @yield('dashboard-content')
        </div>
    </div>
@endsection