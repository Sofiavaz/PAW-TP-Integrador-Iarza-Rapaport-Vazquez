@extends('layouts.app')

<script src="{{asset('js/home/index.js')}}" type="module"></script>

<meta name="_token" content="{{ csrf_token() }}">

@section('content')
    <section>
        <section class="container">
            @if (session('message'))
                <p>{{session('message')}}</p>
            @endif

            <h2 class="info-title">Clases que vas a dar</h2>
            <ul id="teaching-list">
            </ul>
            <div class="text-center">
                <button id="button-more-teaching" class="btn btn-lg btn-border-light">Ver más</button>
            </div>

            <h2 class="section-title">Clases en las que te inscribiste</h2>
            <ul id="taking-list">
            </ul>
        </section>

        @include('partials.recommended_courses')
        @include('partials.upcoming_courses')

    </section>
@endsection
