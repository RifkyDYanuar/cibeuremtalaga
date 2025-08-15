<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Favicon - Multiple formats for better compatibility -->
    <link rel="icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/favicon.png') }}">
    <link rel="shortcut icon" href="{{ url('/favicon.ico') }}">
    <!-- Fallback to images folder -->
    <link rel="alternate icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                        <!-- Navbar Tentang Desa -->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="tentangDesaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Tentang Desa
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="tentangDesaDropdown">
                                        <li><a class="dropdown-item" href="{{ route('public.tentang-desa') }}">Profil Desa</a></li>
                                        <li><a class="dropdown-item" href="{{ route('public.bpd') }}">BPD</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dataDesaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Data Desa
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dataDesaDropdown">
                                        <li><a class="dropdown-item" href="{{ route('public.data-kependudukan') }}">Data Kependudukan</a></li>
                                        <li><a class="dropdown-item" href="{{ route('public.apbdes') }}">APBDES</a></li>
                                        <li><a class="dropdown-item" href="{{ route('public.idm.index') }}">IDM DESA</a></li>
                                        <li><a class="dropdown-item" href="{{ route('public.pembangunan') }}">Pembangunan Desa</a></li>
                                        <li><a class="dropdown-item" href="{{ route('galeri.public') }}">Galeri</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('agenda.public') }}">Agenda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pengumuman.public') }}">Berita</a>
                            </li>
                        </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
</body>
</html>
