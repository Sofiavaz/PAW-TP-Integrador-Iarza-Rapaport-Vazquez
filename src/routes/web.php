<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/courses', 'CourseController');
Route::post('/courses/link/define', 'CourseController@defineLink')->name('courses.defineLink');

Route::get('api/courses/teaching', 'HomeController@teaching')->name('api.courses.teaching');
Route::get('Http/Controllers/Payment/Mercadop/{id}', 'MercadopController@config')->name('Mercadop.config');
