@extends('layouts.app')

@section('title', 'Blog Theme | Edit Profile')
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="edit-profile">
        <h1>Edit Profile</h1>
        <form method="POST" action="{{ route('auth.users.update', ['username' => $user->username]) }}" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="imgAvatar">Avatar</label>
                <input type="file" class="form-control" id="imgAvatar" name="imgAvatar" accept="image/*">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <button type="submit" class="btn btn-primary my-3">Update Profile</button>
        </form>
    </div>

@endsection
