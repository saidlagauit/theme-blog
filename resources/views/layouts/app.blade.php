<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Theme')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    @if (!request()->is('login', 'register'))
        @include('templates.navbar')
    @endif

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success mt-4" role="alert" id="msg-alert">
                <strong class="fw-bold">{{ session('success') }}</strong>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-4" role="alert" id="msg-alert">
                <strong class="fw-bold">{{ session('error') }}</strong>
            </div>
        @endif

        @yield('content')

    </div>

    @include('templates.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
