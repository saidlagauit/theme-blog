@extends('layouts.app')

@section('title', 'Blog Theme | Change Password')
@section('meta_description', '')
@section('keywords', '')

@section('content')
    <div class="new-password">
        <h1>Change Password</h1>

        <form method="POST" action="{{ route('auth.users.change-password.update', ['username' => $user->username]) }}">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror">
                @error('current_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary my-3">Change Password</button>
        </form>
    </div>
@endsection
