@extends('layouts.app')

@section('content')
    <section>

        @if (isset($preference))
            <section class="ready-for-payment">
                <p class="course-view-price-spots">
                    <span class="course-view-price">${{$course->price}}</span>
                    <span class="course-view-spots">{{$course->free_spots}} lugares disponibles</span>
                </p>

                <form action="/procesar-pago" method="POST" class="form-payment">
                    <script
                        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                        data-preference-id="{{$preference->id}}">
                    </script>
                </form>
            </section>
        @endif
        <section class="course-view">

            <img src="/uploads/{{$course->img_path}}">

            <section class="container">
                <h3>{{$course->name}}</h3>
                <p class="clock-icon course-info-duration">{{$course->duration_mins}} minutos</p>
                <p class="course-view-description">{{$course->short_description}}</p>

                <section class="course-view-info">
                    <p class="course-info-teacher">
                        <i class="fas fa-chalkboard-teacher"></i>
                        {{$course->teacher->name}}
                    </p>

                    <p class="course-info-date">
                        <i class="far fa-calendar-alt"></i>
                        {{date("d-M", strtotime($course->date_time))}}
                    </p>

                    <p class="course-info-time">
                        <i class="far fa-clock"></i>
                        {{date("H:i", strtotime($course->date_time))}} hs
                    </p>

                    <p class="course-info-platform">
                        <i class="fas fa-sign-out-alt"></i>
                        {{$course->platform->name}}
                    </p>
                </section>
                <p class="course-view-price-spots">
                    <span class="course-view-price">${{$course->price}}</span>
                    <span class="course-view-spots">{{$course->free_spots}} lugares disponibles</span>
                </p>
                <p class="course-view-btn">
                    <a href="{{route('enrollments.enroll', $course->id)}}"
                       class="btn btn-blue  btn-lg">Inscribirse</a>
                </p>

                <section class="course-view-learn">
                    <h4>¿Qué vas a aprender en esta clase?</h4>
                    <p>{{$course->long_description}}</p>
                </section>
            </section>
        </section>
    </section>

    @include('partials.how_does_it_work_students')

    @include('partials.upcoming_courses')

    @include('partials.recommended_courses')
@endsection
