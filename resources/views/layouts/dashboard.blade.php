@extends('layouts.app')

@section('content')
    <div class="dash-centent">
        <div class="navigation">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="{{ route('auth.dash.dashboard') }}"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <li class="list-group-item"><a href="{{ route('auth.posts.index') }}"><i class="fa-solid fa-thumbtack"></i> Posts</a></li>
                <li class="list-group-item"><a href="{{ route('auth.cmts.comments') }}"><i class="fa-solid fa-comments"></i> Comments</a></li>
                <li class="list-group-item"><a href="{{ route('auth.msgs.messages') }}"><i class="fa-solid fa-envelope"></i> Messages</a></li>
            </ul>
        </div>

        <div class="main">
            @yield('dashboard-content')
        </div>
    </div>
@endsection
