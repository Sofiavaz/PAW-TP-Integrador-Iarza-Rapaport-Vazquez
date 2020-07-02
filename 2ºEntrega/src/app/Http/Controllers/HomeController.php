<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $verified = Auth::user()->emailVerified();

        return view('home.index')->with('emailVerified', $verified);
    }

    /**
     * API call. Returns the courses the user is gonna teach
     */
    public function teaching(Request $request){
        $perPage = $request->get('perPage');
        return Course::teaching()->after(now())->paginate($perPage);
    }

    /**
     * API call. Returns the courses the user is gonna take
     */
    public function taking(Request $request){
        $perPage = $request->get('perPage');
        return Course::taking()->after(now())->paginate($perPage);
    }
}
