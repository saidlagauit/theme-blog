@extends('layouts.app')

@section('title', 'Blog Theme | ' . $user->name)
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="profile">
        <h1>Profile</h1>
        <p>Username: {{ $user->username }}</p>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <div class="btn-action">
            <a href="{{ route('auth.users.edit', ['username' => $user->username]) }}" class="btn btn-success">Edit Profile</a>
            <a href="{{ route('auth.users.change-password', ['username' => $user->username]) }}" class="btn btn-info">Change Password</a>
        </div>
    </div>

@endsection
