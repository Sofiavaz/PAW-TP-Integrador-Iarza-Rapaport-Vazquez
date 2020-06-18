@extends('layouts.app')

@section('content')
    <section>
        <div class="card">
            <div class="row">
                <div class="col-res-2">
                    <img style="width: 13vw"
                         src="https://akm-img-a-in.tosshub.com/indiatoday/images/story/201811/online-3412473_1920_1.jpeg?tz.RfsTe_UTLHiDqxmpG7PY_nTIBjwF7">
                </div>
                <div class="col-res-6">
                    <p>{{$course->name}} | {{$course->platform->name}}</p>
                    <p>{{$course->teacher->name}}</p>
                    <p>{{$course->short_description}}</p>
                </div>
                <div class="col-res-2 text-right">
                    <p>${{$course->price}}</p>
                    <p>{{$course->date_time}}</p>
                    <p>Lugares: {{$course->duration_mins}}</p>
                    <a href="{{route('enrollment.enroll', $course->id)}}" class="btn btn-border-blue">Inscribirse</a>
                </div>
            </div>

            <h4>¿Qué vas a aprender?</h4>
            <p>{{$course->long_description}}</p>
        </div>


    </section>

    @include('partials.how_does_it_work_students')

    @include('partials.upcoming_courses')

    @include('partials.recommended_courses')
@endsection
