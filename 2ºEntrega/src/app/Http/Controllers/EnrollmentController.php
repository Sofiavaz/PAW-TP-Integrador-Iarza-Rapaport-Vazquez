<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function enroll($courseId){
        return redirect()->route('courses.show', $courseId)->with('status', 'ready-for-payment');
    }
}
