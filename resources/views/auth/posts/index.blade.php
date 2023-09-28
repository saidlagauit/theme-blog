@extends('layouts.app')

@section('title', 'Blog Theme | Manage Posts')
@section('meta_description', '')
@section('keywords', '')

@section('content')

    <div class="posts-edit">
        <h1>Posts <a class="btn btn-primary" href="{{ route('auth.posts.create') }}">Add New</a></h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Controller</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td class="btn-action">
                                <a href="{{ route('blog.single-blog', $post->slug) }}" class="btn btn-info">View</a>
                                <a href="{{ route('auth.posts.edit', ['id' => $post->id]) }}"
                                    class="btn btn-success">Edit</a>
                                <form method="POST" action="{{ route('auth.posts.destroy', ['id' => $post->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection
