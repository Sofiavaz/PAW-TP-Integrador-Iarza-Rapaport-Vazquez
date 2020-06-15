@extends('layouts.app')

@section('content')
    <section>Imagen de portada</section>

    @include('partials.upcoming_courses')

    @include('partials.how_does_it_work_students')

    @include('partials.recommended_courses')

    @include('partials.how_does_it_work_teachers')

@endsection
