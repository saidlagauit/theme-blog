@extends('layouts.dashboard')

@section('title', 'Blog Theme | Manage Messages')
@section('meta_description', '')
@section('keywords', '')

@section('dashboard-content')
    <div class="manage-messages">
        <h1>Manage Messages</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Controller</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $msg)
                        <tr>
                            <td>{{ $msg->full_name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->phone }}</td>
                            <td>{{ $msg->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="btn-action">
                                <form method="POST" action="{{ route('auth.posts.message-details.delete', $msg->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                <a href="{{ route('auth.posts.message-details', $msg->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
