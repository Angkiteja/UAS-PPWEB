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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/user') }}" >
                    {{ config('app.name', 'Laravel') }}
                </a>
                @if(Auth::check() && Auth::user()->level == 'admin')
                
                <li class="nav-item">
                    <a class="nav-link active" href="/user"></a></li>

                <!-- <li class="nav-item active" style="list-style:none;">
                    <a class="nav-link" href="/">My Name <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" style="list-style:none;">
                    <a class="nav-link" href="/about">Say Hi</a>
                </li>
                <li class="nav-item" style="list-style:none;">
                    <a class="nav-link" href="/wau">Who Are u?</a>
                </li>
                <li class="nav-item" style="list-style:none;">
                    <a class="nav-link" href="/university">College</a>
                </li> -->
                <li class="nav-item" style="list-style: none;">
                    <a class="nav-link" href="/mahasiswa">List Mahasiswa</a>
                </li>
                <li class="nav-item" style="list-style:none;">
                    <a class="nav-link" href="/buku">List Aset</a>
                </li>
                <li class="nav-item" style="list-style:none;">
                    <a class="nav-link" href="/user">List User</a>
                </li>

                <li class="nav-item" style="list-style:none;">
                    <a class="nav-link" href="/galeri">Galeri Aset</a>
                </li>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
</body>
</html>
