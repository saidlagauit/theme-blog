@extends('layouts.app')

@section('title', 'Blog Theme | ' . $user->name)
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="profile min-width">
        <h1>Profile</h1>
        <p>Username: {{ $user->username }}</p>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <a href="{{ route('auth.users.edit', ['username' => $user->username]) }}" class="btn btn-primary">Edit Profile</a>

    </div>

@endsection
