@extends('layouts.app')

@section('content')
    <section>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <p>
                <label for="name">{{ __('Name') }}</label>

                <input id="name" type="text" name="name"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
            </p>
            <p>
                @error('name')
                <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <label for="email">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </p>
            <p>
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <input id="password" type="password"
                       name="password" required autocomplete="new-password">
            </p>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <p>
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" name="password_confirmation"
                       required autocomplete="new-password">
            </p>
            <button type="submit">
                {{ __('Register') }}
            </button>
        </form>
    </section>
@endsection
