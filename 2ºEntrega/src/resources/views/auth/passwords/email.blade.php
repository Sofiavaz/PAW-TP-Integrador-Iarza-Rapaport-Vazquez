@extends('layouts.app')

@section('content')
    <section class="container">
        <h2 class="text-center info-title">Reestablecer contraseña</h2>
        @if (session('status'))
            <div class="info-message success-message" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}" class="offset-res-3 col-res-4">
            @csrf
            <p class="row">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="col-res-10"
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </p>

            <button type="submit" class="btn btn-lg btn-block btn-blue">
                Reestablecer contraseña
            </button>
        </form>

    </section>

@endsection
