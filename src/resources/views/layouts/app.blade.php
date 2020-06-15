<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashcourse') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('scripts')
</head>
<body>
<div id="app">
    <nav class="navbar">
        <div class="">
            <a class="navbar-logo col-res-3" href="{{ url('/') }}">
                <img src="https://es.freelogodesign.org/Content/img/logo-samples/flooop.png">
            </a>

            <section class="navbar-items col-res-2 offset-5 text-right">
                <ul>
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="ml-2">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="{{route('home')}}" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
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

    <main class="body container">

        @yield('content')

    </main>
    <footer class="container text-center">
         <h2>Dashcourse</h2>
        <p>Encontrá las clases en vivo que buscás</p>
    </footer>
</div>
</body>
</html>
