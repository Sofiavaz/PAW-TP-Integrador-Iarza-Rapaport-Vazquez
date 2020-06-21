@extends('layouts.app')

<script src="{{asset('js/home/index.js')}}" type="module"></script>

@section('content')
    <section>
        <section class="container">
            @if (session('message'))
                <p>{{session('message')}}</p>
            @endif

            <h2 class="info-title">Clases que vas a dar</h2>
            <ul>
                @forelse($coursesAsTeacher as $course)
                    <li class="courseCard">
                        <img>
                        <h3 class="courseCardTitle">{{$course->name}}</h3>
                        @isset($course->access_link)
                            <p>Link definido</p>
                        @else
                            <a class="btn btn-border-blue set-link-btn" id="set-link-btn-{{$course->id}}">Definir
                                link</a>
                            <form class="set-link-form" method="post" action="{{route('courses.defineLink')}}"
                                  id="set-link-form-{{$course->id}}">
                                @csrf
                                <input type="hidden" name="course-id" value="{{$course->id}}">
                                <label for="course-link">Link</label>
                                <input name="course-link">
                                <input type="submit" value="Confirmar">
                            </form>
                        @endisset
                    </li>
                @empty
                    <li>Acá aparecerán las clases que vas a dar...</li>
                @endforelse
            </ul>

            <h2 class="section-title">Clases en las que te inscribiste</h2>
            <ul>
                @forelse($coursesAsStudent as $course)
                    <li>{{$course}}</li>
                @empty
                    <li>Acá aparecerán las clases en que te inscribiste...</li>
                @endforelse
            </ul>
        </section>

        @include('partials.recommended_courses')
        @include('partials.upcoming_courses')

    </section>
@endsection
