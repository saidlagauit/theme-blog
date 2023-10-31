<nav class="navbar navbar-expand-lg bg-body-tertiary text-capitalize">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Blog Theme</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-pen-clip"></i> Writing</a></li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user"></i> {{ Auth::user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="{{ route('auth.users.profile', Auth::user()->username) }}" class="dropdown-item"><i class="fa-solid fa-user"></i> Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('auth.dash.dashboard') }}"><i class="fa-solid fa-signs-post"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('auth.posts.create') }}"><i class="fa-solid fa-plus"></i> Create Post</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fa-solid fa-right-to-bracket"></i> Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('auth.login') }}"><i class="fa-solid fa-door-open"></i> Enter</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
