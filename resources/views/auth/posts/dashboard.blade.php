@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('dashboard-content')
    <div class="dash">
        <h1>Dashboard</h1>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-file-word"></i> Posts</h5>
                        <p class="card-text">{{ $totalPosts }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-comments"></i> Comments</h5>
                        <p class="card-text">{{ $totalComments }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fa-solid fa-envelope"></i> Messages</h5>
                        <p class="card-text">{{ $totalMessages }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
