@extends('layouts.app')

@section('title', 'Blog Theme | Login')
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="login mt-3">
        <h1>Login</h1>
        <form method="POST" action="{{ route('auth.login') }}" autocomplete="off">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email">
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
            <div class="form-check my-3">
                <input class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} id="remember" name="remember" >
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>


@endsection
