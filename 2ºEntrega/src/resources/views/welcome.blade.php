@extends('layouts.app')

@section('content')
    <section class="cover">
        <div class="cover-body container">
            <h1>Cartelera de clases en vivo</h1>
            <div class="col-res-4">
                <h2>Explorás clases en vivo. Te inscribís. Recibís los datos para poder asistir.</h2>
            </div>
            <p class="row">
                <a class="btn btn-lg btn-border-white" href="{{route('api.courses.recommended')}}">Explorar</a>
            </p>
        </div>
    </section>

    @include('partials.upcoming_courses')

    @include('partials.how_does_it_work_students')

    @include('partials.how_does_it_work_teachers')

    @include('partials.recommended_courses')

@endsection
