@extends('layouts.app')

@section('title', 'Blog Theme | Manage Comments')
@section('meta_description', '')
@section('keywords', '')

@section('content')
    <div class="manage-comments">
        <h1>Manage Comments</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Author (email)</th>
                        <th>Comment</th>
                        <th>Submitted on</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>
                                <strong>{{ $comment->name }}</strong>
                                <span>({{ $comment->email }})</span>
                            </td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="btn-action">
                                @if (!$comment->approved)
                                    <form method="POST"
                                        action="{{ route('auth.posts.comments.approve', ['comment' => $comment->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                @else
                                    <form method="POST"
                                        action="{{ route('auth.posts.comments.unapprove', ['comment' => $comment->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-warning">Unapprove</button>
                                    </form>
                                @endif

                                <form method="POST"
                                    action="{{ route('auth.posts.comments.destroy', ['comment' => $comment->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

                                <a href="{{ route('blog.single-blog', ['slug' => $comment->post->slug]) }}"
                                    class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
