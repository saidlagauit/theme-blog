@extends('layouts.dashboard')

@section('title', 'Blog Theme | Manage Comments')
@section('meta_description', '')
@section('keywords', '')

@section('dashboard-content')
    <div class="manage-comments">
        <h1>Manage Comments</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Author (email)</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Controller</th>
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
                                    <form method="POST" action="{{ route('auth.cmts.comments.approve', ['comment' => $comment->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-circle-check"></i></button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('auth.cmts.comments.unapprove', ['comment' => $comment->id]) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-warning"><i class="fa-solid fa-circle-xmark"></i></button>
                                    </form>
                                @endif

                                <form method="POST" action="{{ route('auth.cmts.comments.destroy', ['id' => $comment->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>

                                <a href="{{ route('blog.single-blog', ['slug' => $comment->post->slug]) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
