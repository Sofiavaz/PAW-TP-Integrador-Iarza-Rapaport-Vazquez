@extends('layouts.app')

@section('content')
<section>
    <h2>Clases disponibles</h2>

    <ul>
    @foreach($courses as $course)
        <li>{{$course}}</li>
    @endforeach
    </ul>
</section>
@endsection
