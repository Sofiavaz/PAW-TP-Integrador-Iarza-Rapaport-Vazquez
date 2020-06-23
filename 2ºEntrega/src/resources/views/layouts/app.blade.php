<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashcourse - Cartelera de clases en vivo</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('scripts')
</head>
<body>
<div id="app">
    <nav class="navbar">
        <div class="row container">
            <section class="col-4">
                <a href="{{ url('/') }}">
                    <p class="logo">Dashcourse</p>
                </a>
            </section>
            <section class="navbar-items col-6 text-right">
                <ul>
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="ml-2">
                                <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="{{route('home')}}" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false" v-pre>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" class="ml-2"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </section>
        </div>
    </nav>

    <main class="body ">

        @yield('content')

    </main>
    <footer class="text-center">
        <section class="footer-info container">
            <h2 class="logo">Dashcourse</h2>
            <p>Encontrá las clases en vivo que buscás</p>
        </section>
        <section class="footer-copy">
            <p>Dashcourse {{date('Y')}} - Todos los derechos reservados</p>
        </section>
    </footer>
</div>
</body>
</html>
