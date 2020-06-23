@extends('layouts.app')


@section('scripts')
    <script src="{{asset('js/courses/create.js')}}"></script>
@endsection

@section('content')
<section class="container">
    <h2 class="info-title">Crear una clase</h2>
    <p>¡Acá podés registrar tu clase!</p>

    @if ($errors->any())
        <p>{{$errors->first()}}</p>
    @endif

    <form action="{{route('courses.store')}}" method="post" id="create-course-form">
        @csrf

        <p class="img-input">
            <label>Imagen de portada</label>
            <img alt="Imagen del curso" src="{{asset('imgs/gray-bg-sm.png')}}">
            <input type="file" id="course-img" name="course_img">
        </p>

        <p>
            <label for="name">Título</label>
            <input type="text" name="name" value="{{old('name')}}">
        </p>

        <p>
            <label for="date_time">Fecha y hora</label>
            <input type="datetime-local" name="date_time" value="{{old('date_time')}}" class="col-5">
        </p>

        <p>
            <label for="short_description">Breve descripción</label>
            <input type="text" name="short_description" value="{{old('short_description')}}">
        </p>

        <p>
            <label for="long_description">Descripción completa</label>
            <textarea name="long_description" value="{{old('long_description')}}"></textarea>
        </p>

        <p class="col-4">
            <label for="max_enrollments">Cant. alumnos</label>
            <input type="number" name="max_enrollments" value="{{old('max_enrollments')}}">
        </p>

        <p class="col-4 offset-2">
            <label for="price">Precio</label>
            <span class="col-1">$</span>
            <input type="number" name="price" value="{{old('precio')}}" class="col-9">
        </p>


        <p class="col-5">
            <label for="duration_mins">Duración</label>
            <input type="number" name="duration_mins" value="{{old('duration')}}" class="col-5">
            <span class="col-2 ml-1">minutos</span>
        </p>

        <p class="col-4 offset-1">
            <label for="platform_name">Plataforma</label>
            <select name="platform_name" id="platform_name" value="{{old('platform_name')}}" class="col-10">
            </select>
        </p>

        <p>
            <label for="access_link">Link de acceso:</label>
            <input type="text" name="access_link" value="{{old('access_link')}}">
        </p>

        <p>
            <input type="submit" value="Registrar" class="btn btn-blue">
        </p>

    </form>

</section>
@endsection
