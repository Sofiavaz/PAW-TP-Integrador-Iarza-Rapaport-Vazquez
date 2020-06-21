@extends('layouts.app')

@section('content')
    <section class="container">

        <h2 class="text-center info-title">¡Inicia sesión en Dashcourse!</h2>


        @if ($errors->any())
            <p class="text-center text-danger">
                <strong>{{ $errors->first() }}</strong>
            </p>
        @endif


        <form method="POST" action="{{ route('login') }}" class="offset-4 col-res-2">
            @csrf
            <p class="row">
                <label for="email" class="col-res-10">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email"
                       name="email"
                       class="col-res-10"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
            </p>
            <p class="row">
                <label for="password" class="col-res-10">{{ __('Password') }}</label>
                <input id="password" type="password"
                       name="password" class="col-res-10"
                       required autocomplete="current-password">
            </p>

            <p class="row">
                <button type="submit" class="btn btn-lg btn-block btn-blue">
                    Iniciar sesión
                </button>
            </p>

            <p class="row text-center">
                @if (Route::has('password.request'))
                    <a class="btn" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </p>
            <p class="row text-center">
                ¿No tenés una cuenta?
                <b><a href="{{route('register')}}">Registrate</a></b>
            </p>
        </form>

    </section>

@endsection
