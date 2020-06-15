@extends('layouts.app')


@section('scripts')
    <script src="{{asset('js/courses/create.js')}}"></script>
@endsection

@section('content')
<section class="container">
    <h2>Crear una clase</h2>
    <p>Acá podés registrar tu clase</p>

    <form>
        <p>
            <label for="name">Nombre</label>
            <input type="text" name="name">
        </p>

        <p>
            <label for="date_time">Fecha y hora</label>
            <input type="datetime-local" name="date_time">
        </p>

        <p>
            <label for="short_description">Breve descripción</label>
            <input type="text" name="short_description">
        </p>

        <p>
            <label for="long_description">Descripción completa</label>
            <textarea name="long_description"></textarea>
        </p>

        <p>
            <label for="max_enrollments">Cantidad de participantes</label>
            <input type="number" name="max_enrollments">
        </p>

        <p>
            <label for="price">Precio</label>
            <input type="number" name="price">
        </p>

        <p>
            <label for="platform_name">Plataforma</label>
            <select name="platform_name" id="platform_name">
            </select>
        </p>

        <p>
            <label for="access_link">Link de acceso:</label>
            <input type="text" name="access_link">
        </p>

        <p>
            <input type="submit" value="Registrar">
        </p>

    </form>

</section>
@endsection
