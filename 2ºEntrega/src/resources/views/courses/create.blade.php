@extends('layouts.app')


@section('scripts')
    <script src="{{asset('js/courses/create.js')}}"></script>
@endsection

@section('content')
<section class="container">
    <h2 class="info-title">Crear una clase</h2>
    <p>¡Acá podés registrar tu clase!</p>


    <form action="{{route('courses.store')}}" method="post" id="create-course-form" enctype="multipart/form-data">
        @csrf

        <p class="img-input">
            <label for="img">Imagen de portada</label>
            <img alt="Imagen del curso" src="{{asset('imgs/gray-bg-sm.png')}}">
            <input type="file" id="course_img" name="course_img" value="{{old('img')}}">
            @error('course_img')
            <span class="form-error-message col-10">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="name">Título</label>
            <input type="text" name="name" value="{{old('name')}}">
            @error('name')
                <span class="form-error-message col-10">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="date_time">Fecha y hora</label>
            <input type="datetime-local" name="date_time" value="{{old('date_time')}}" class="col-6">
            @error('date_time')
                <span class="form-error-message col-10">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="short_description">Breve descripción</label>
            <input type="text" name="short_description" value="{{old('short_description')}}">
            @error('short_description')
                <span class="form-error-message col-10">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="long_description">Descripción completa</label>
            <textarea name="long_description" value="{{old('long_description')}}"></textarea>
        </p>

        <p class="col-4">
            <label for="max_enrollments">Cant. alumnos</label>
            <input type="number" name="max_enrollments" value="{{old('max_enrollments')}}">
            @error('max_enrollments')
                <span class="form-error-message col-10">{{ $message }}</span>
            @enderror
        </p>

        <p class="col-4 offset-2">
            <label for="price">Precio</label>
            <span class="col-1">$</span>
            <input type="number" name="price" value="{{old('precio')}}" class="col-9">
            @error('price')
                <span class="form-error-message col-10">{{ $message }}</span>
            @enderror
        </p>


        <p class="col-5">
            <label for="duration_mins">Duración</label>
            <input type="number" name="duration_mins" value="{{old('duration')}}" class="col-5">
            <span class="col-2 ml-1">minutos</span>
            @error('duration_mins')
                <span class="form-error-message col-10">{{ $message }}</span>
            @enderror
        </p>

        <p class="col-4 offset-1">
            <label for="platform_name">Plataforma</label>
            <select name="platform_name" id="platform_name" value="{{old('platform_name')}}" class="col-10">
            </select>
            @error('platform_name')
                <span class="form-error-message">{{ $message }}</span>
            @enderror
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
