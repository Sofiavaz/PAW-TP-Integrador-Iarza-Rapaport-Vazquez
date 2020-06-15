@extends('layouts.app')

@section('content')
    <section>
        <h3>Acerca del curso...</h3>

        <div>
            <img>
            <p>Nombre:</p>
            <p>Profesor:</p>
            <p>Día y hora:</p>
            <p>Precio:</p>
            <p>Descripción:</p>
            <p>Duración:</p>
            <p>Lugares disponibles:</p>
            <p>Plataforma:</p>
            <p>Qué vas a aprender:</p>
            <a href="">Inscribirse</a>
        </div>
    </section>

    @include('partials.how_does_it_work_students')

    @include('partials.upcoming_courses')

    @include('partials.recommended_courses')
@endsection
