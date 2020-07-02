<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/courses', 'CourseController');
Route::post('/courses/link/define', 'CourseController@defineLink')->name('courses.defineLink');

Route::get('api/courses', 'CourseController@all')->name('api.courses');
Route::get('api/courses/teaching', 'HomeController@teaching')->name('api.courses.teaching');
Route::get('api/courses/taking', 'HomeController@taking')->name('api.courses.taking');
Route::get('api/courses/upcoming', 'CourseController@upcoming')->name('api.courses.upcoming');
Route::get('api/courses/recommended', 'CourseController@recommended')->name('api.courses.recommended');

Route::get('/enrollments/successful', 'EnrollmentController@paymentSuccessful')->name('enrollments.successful');
Route::get('/enrollments/failure', 'EnrollmentController@paymentFailure')->name('enrollments.failure');
Route::get('/enrollments/pending', 'EnrollmentController@paymentPending')->name('enrollments.pending');
Route::post('/enrollments/payment-notification', 'EnrollmentController@paymentNotification')
    ->name('enrollments.paymentNotification');
Route::get('/enrollments/{id}', 'EnrollmentController@enroll')->name('enrollments.enroll');

