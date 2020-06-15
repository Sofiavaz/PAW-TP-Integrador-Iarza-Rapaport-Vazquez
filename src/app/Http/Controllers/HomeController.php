<?php

namespace App\Http\Controllers;

use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $coursesAsStudent = Course::asStudent();

        $coursesAsTeacher = Course::asTeacher();

        return view('home.index', compact('coursesAsStudent', 'coursesAsTeacher'));
    }
}
