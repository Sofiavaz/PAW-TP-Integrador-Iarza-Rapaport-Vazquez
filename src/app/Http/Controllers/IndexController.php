<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){
        // Cursos por empezar
        $courses = Course::upcoming();

        return view('welcome', compact('courses'));
    }
}
