@extends('layouts.app')

<script src="{{asset('js/home/index.js')}}" type="module"></script>

<meta name="_token" content="{{ csrf_token() }}">

@section('content')

    @if (session('error'))
        <section class="info-message error-message">
            <p>{{session('error')}}</p>
        </section>
    @else
        @if (session('message'))
            <section class="info-message success-message">
                <p>{{session('message')}}</p>
            </section>
        @endif
    @endif
    <section class="container">
        <h2 class="info-title">Clases que vas a dar <a class="btn btn-blue btn-sm float-right"
                                                       href="{{route('courses.create')}}">Nueva</a></h2>

        <ul id="teaching-list" class="container">
            <li class="text-center">Ups... ¡todavía no tenés clases para dar!
                <a class="text-main" href="{{route('courses.create')}}">Creá una</a></li>
        </ul>
        <div class="text-center">
            <button id="button-more-teaching" class="btn btn-lg btn-border-light">Ver más</button>
        </div>
    </section>
    <section class="container container-border-down">
        <h2 class="info-title">Clases en las que te inscribiste</h2>
        <ul id="taking-list" class="container">
            <li class="text-center">Ups... ¡Todavía no asistís a ninguna clase!
                <a class="text-main" href="{{route('courses.index')}}">Explorá</a></li>
        </ul>
        <div class="text-center">
            <button id="button-more-taking" class="btn btn-lg btn-border-light">Ver más</button>
        </div>
    </section>

    @include('partials.upcoming_courses')
    @include('partials.recommended_courses')

@endsection
