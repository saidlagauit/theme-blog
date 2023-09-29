@extends('layouts.app')

@section('title', 'Blog Theme | Register')
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="register-new mt-3">
        <h1>Register</h1>
        <form method="POST" action="{{ route('auth.register') }}" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username"
                    value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                    name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

@endsection
