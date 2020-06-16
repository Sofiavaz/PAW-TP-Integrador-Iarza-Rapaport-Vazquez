@extends('layouts.app')

@section('content')
<section>
    <h1>Dashboard</h1>

    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif

    <h2>Clases que vas a dar</h2>
    <ul>
        @forelse($coursesAsTeacher as $course)
            <li>{{$course}}</li>
        @empty
            <li>Acá aparecerán las clases que vas a dar...</li>
        @endforelse
    </ul>

    <h2>Clases en las que te inscribiste</h2>
    <ul>
        @forelse($coursesAsStudent as $course)
            <li>{{$course}}</li>
        @empty
            <li>Acá aparecerán las clases en que te inscribiste...</li>
        @endforelse
    </ul>

    @include('partials.recommended_courses')
    @include('partials.upcoming_courses')

</section>
@endsection
