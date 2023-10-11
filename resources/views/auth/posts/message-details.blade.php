@extends('layouts.dashboard')

@section('title', 'Blog Theme | Message Details')
@section('meta_description', '')
@section('keywords', '')

@section('dashboard-content')

    <div class="message-details">
        <h2>Message Details</h2>
        <p><strong>Name:</strong> {{ $message->full_name }}</p>
        <p><strong>Email:</strong> {{ $message->email }}</p>
        <p><strong>Phone:</strong> {{ $message->phone }}</p>
        <p><strong>Created At:</strong> {{ $message->created_at->format('Y-m-d H:i:s') }}</p>
        <p><strong>Message:</strong> {{ $message->message }}</p>
        <a href="{{ route('auth.posts.messages') }}" class="btn btn-secondary">Back to Messages</a>

    </div>

@endsection
