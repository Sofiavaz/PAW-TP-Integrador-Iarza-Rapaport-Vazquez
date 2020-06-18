<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/courses', 'CourseController');
Route::post('/courses/link/define', 'CourseController@defineLink')->name('courses.defineLink');

Route::get('enrollment/{id}', 'EnrollmentController@enroll')->name('enrollment.enroll');
