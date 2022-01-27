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

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/style_added.css">

</head>
<body>
    <div id="app">

        <header class="p-3 header text-white">
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
                            <a href="/register" class="btn btn-light" >Register</a>
                        </div>
                        @endguest
                      
                        @guest
                        @else
                        <div class="dropdown">
                            <a href="#" 
                                class="d-flex align-items-center link-light text-decoration-none dropdown-toggle " 
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <p class="mb-0 me-2 fs-6" >{{Auth::user()->email}}</p>
                                <img src="/images/{{Auth::user()->image}}" alt="{{Auth::user()->firstName}}" class="rounded-circle" width="32" height="32">
                            </a>    
                            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                                @if (Auth::user()->admin)
                                    <li><a class="dropdown-item" href="/dashboard/propertyForm">Add Property...</a></li>
                                @endif
                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
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
          <footer class="footer">
            <div class="container-ft">
                <div class="row-ft">

                    <div class="footer-col">
                        <h4>Our company</h4>
                            <ul>
                                <li><a href="#">about us </a></li>
                                <li><a href="#">our services  </a></li>
                                <li><a href="#">Privacy policy </a></li>
                                <li><a href="#">affiliate program</a></li> 
                            </ul>
                       
                    </div>

                    <div class="footer-col">
                        <h4> Get help </h4>
                            <ul>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">shipping</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Order status</a></li>
                                <li><a href="#">Paiment options</a></li>
                            </ul>
                        
                    </div>

                    <div class="footer-col">
                        <h4> online booking</h4>
                            <ul>
                                <li><a href="#">hotels</a></li>
                                <li><a href="#">villas </a></li>
                                <li><a href="#"> beatch houses</a></li>
                                <li><a href="#">appartements</a></li>
                            </ul>
                     
                    </div>

                    <div class="footer-col">
                        <h4> Follow us </h4>
                            <div class="social-links">
                                <a href="#"> <i class="bi bi-facebook" ></i></a>
                                <a href="#"> <i class="bi bi-messenger"></i></a>
                                <a href="#"> <i class="bi bi-whatsapp" style="vertical-align:middle;"></i></a>
                                <a href="#"> <i class="bi bi-instagram"></i></a>
                            </div>
                     
                    </div>
                    
                </div>
            </div>

        </footer>
</body> 
</html>
