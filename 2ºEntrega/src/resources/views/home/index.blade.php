@extends('layouts.app')

<script src="{{asset('js/home/index.js')}}" type="module"></script>

<meta name="_token" content="{{ csrf_token() }}">

@section('content')
    <section>
        <section class="container container-border-down">
            @if (session('message'))
                <p>{{session('message')}}</p>
            @endif

            <h2 class="info-title">Clases que vas a dar</h2>
            <a class="button-info-title btn btn-blue" href="{{route('courses.create')}}">Nueva</a>
            <ul id="teaching-list">
                <li class="text-center">Ups... ¡todavía no tenés clases para dar!
                    <a class="text-main" href="{{route('courses.create')}}">Creá una</a></li>
            </ul>
            <div class="text-center">
                <button id="button-more-teaching" class="btn btn-lg btn-border-light">Ver más</button>
            </div>

            <h2 class="info-title">Clases en las que te inscribiste</h2>
            <ul id="taking-list">
                <li class="text-center">Ups... ¡Todavía no asistís a ninguna clase!
                    <a class="text-main" href="{{route('courses.index')}}">Explorá</a></li>
            </ul>
            <div class="text-center">
                <button id="button-more-taking" class="btn btn-lg btn-border-light">Ver más</button>
            </div>
        </section>

        @include('partials.upcoming_courses')
        @include('partials.recommended_courses')

    </section>
@endsection
