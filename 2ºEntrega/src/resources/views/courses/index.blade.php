@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/courses/index.js')}}" type="module"></script>
@endsection

@section('content')
<section class="container">
    <h2 class="info-title">Clases disponibles</h2>

    <ul id="course-list" class="container">
    </ul>

    <div class="text-center">
        <button id="button-more" class="btn btn-lg btn-border-light">Ver más</button>
    </div>
</section>
@endsection
