@extends('layouts.app')

<script src="https://www.google.com/recaptcha/api.js?render=6LdkyKoZAAAAAHXm4XbBEDRYLycecUHOiNkBzFwp"></script>
<script src="{{asset('js/auth/login.js')}}" type="module"></script>

@section('content')
    <section class="container">

        <h2 class="text-center info-title">¡Inicia sesión en Dashcourse!</h2>

        @if ($errors->any())
            <p class="text-center text-danger">
                <strong>{{ $errors->first() }}</strong>
            </p>
        @endif


        <form method="POST" action="{{ route('login') }}" class="offset-res-3 col-res-4" id="login-form">
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
                <input type="submit" class="btn btn-block btn-blue text-sm g-recaptcha"
                       value="Iniciar sesión"
                       data-sitekey="reCAPTCHA_site_key"
                       data-callback='onSubmit'
                       data-action='submit'/>
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
