@extends('layouts.app')

<script src="https://www.google.com/recaptcha/api.js?render=6LdkyKoZAAAAAHXm4XbBEDRYLycecUHOiNkBzFwp"></script>
<script src="{{asset('js/auth/register.js')}}" type="module"></script>

@section('content')
    <section class="container">
        <h2 class="text-center info-title">¡Creá tu cuenta en Dashcourse!</h2>

        <form method="POST" action="{{ route('register') }}" class="offset-res-3 col-res-4" id="register-form">
            @csrf
            <p class="row">
                <label for="name" class="col-res-10">{{ __('Name') }}</label>

                <input id="name" type="text" name="name" class="col-res-10"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
            </p>
            <p class="row">
                @error('name')
                <span role="alert">
                        <strong>{{ $message }}</strong>
                   </span>
                @enderror

                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="col-res-10"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </p>
            <p class="row">
                <label for="password" class="text-md-right">{{ __('Password') }}</label>

                <input id="password" type="password" class="col-res-10"
                       name="password" required autocomplete="new-password">
            </p>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <p class="row">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" name="password_confirmation"
                       required autocomplete="new-password" class="col-res-10">
            </p>
            <p class="row">
                <input type="submit" class="btn text-sm btn-block btn-blue g-recaptcha"
                       data-sitekey="reCAPTCHA_site_key"
                       data-callback='onSubmit'
                       data-action='submit'
                       value="{{ __('Register') }}"/>

            <p>
            <p class="row text-center">
                ¿Ya tenés una cuenta?
                <b><a href="{{route('login')}}">Inicia sesión</a></b>
            </p>
        </form>
    </section>
@endsection
