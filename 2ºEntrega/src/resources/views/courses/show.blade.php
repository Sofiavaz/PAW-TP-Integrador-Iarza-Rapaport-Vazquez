@extends('layouts.app')

@section('content')
    <section class="container">

        @if (session('error'))
        <section class="info-message error-message">
            <p>{{session('error')}}</p>
        </section>
        @else
        @if (session('message'))
            <section class="info-message success-message">
                <p>{{session('message')}}</p>
            </section>
        @endif
        @endif

        @if (isset($preference))
            <section class="ready-for-payment">
                <p class="course-view-price-spots">
                    <span class="course-view-price">${{$course->price}}</span>
                    <span class="course-view-spots">{{$course->free_spots}} lugares libres</span>
                </p>

                <form action="/procesar-pago" method="POST" class="form-payment" >
                    <script
                        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                        data-preference-id="{{$preference->id}}"
                        data-button-label="Inscribirse"
                        data-button-color="#81ecec">
                    </script>
                </form>
            </section>
        @endif
        <section class="course-view container">

            <img src="/uploads/{{$course->img_path}}">

            <section class="">
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
                <div class="course-view-btn">
                    @if (isset($preference))
                    <form action="/procesar-pago" method="POST" class="form-payment">
                        <script
                            src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                            data-preference-id="{{$preference->id}}"
                            data-button-label="Inscribirse">
                        </script>
                    </form>
                    @else
                        <a href="{{route('enrollments.enroll', $course->id)}}"
                           class="btn btn-blue btn-lg btn-block">Inscribirse</a>
                    @endif
                </div>

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
