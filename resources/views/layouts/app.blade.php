<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/header.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="mans__nav" >
                    <div class="mans__nav__primary">

                        <a class="fs-4 text-white text-decoration-none" href="/">
                            BookItInit
                        </a>
                        
                        <button class="toggle-button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                    
                    <div class="mans__nav__core collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="reg__links__list">
                            @guest
                            @else
                            <li><a class="nav-link fs-5 {{Request::path()=='dashboard' ? 'active' : ''}}" href="/dashboard">Dashboard</a></li>
                            @endguest
                            <li><a class="nav-link fs-5  {{Request::path()=='explore' ? 'active' : ''}}" href="/explore">Explore</a></li>
                        </ul>

                        @guest
                        <div class="auth__links" >
                            <a href="/login" class="btn btn-outline-light">Login</a>
                            <a href="/register" class="btn btn-warning" >Register</a>
                        </div>
                        @endguest
                      
                        @guest
                        @else
                        <div class="dropdown">
                            <a href="#" 
                                class="d-flex align-items-center link-light text-decoration-none dropdown-toggle " 
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <p class="mb-0 me-2 fs-6" >{{$user->email}}</p>
                                <img src="/images/{{$user->image}}" alt="{{$user->firstName}}" class="rounded-circle" width="32" height="32">
                            </a>    
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                                @if ($user->admin)
                                    <li><a class="dropdown-item" href="/property/create">Add Property...</a></li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     Logout
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>

                                </li>
                                
                              </ul>
                        </div>    
                        @endguest
                    </div>
                
                </div>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
