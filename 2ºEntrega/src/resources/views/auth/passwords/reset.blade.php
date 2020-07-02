@extends('layouts.app')

@section('content')
    <section class="container">
        <h2 class="text-center info-title">Restablecer contraseña</h2>

        <form method="POST" action="{{ route('password.update') }}" class="offset-res-3 col-res-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <p>
                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required
                       autocomplete="email"
                       autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>
            <p>
                <label for="password"
                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror" name="password"
                       required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </p>
            <p>
                <label for="password-confirm"
                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control"
                       name="password_confirmation" required autocomplete="new-password">
            </p>
            <button type="submit" class="btn btn-block btn-lg btn-blue">
                {{ __('Reset Password') }}
            </button>
        </form>
    </section>
@endsection
