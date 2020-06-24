<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Requests\StoreCourse;
use App\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $courses = Course::paginate(5);

        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Devuelve un json con las clases proximas a comenzar
     */
    public function upcoming(Request $request){
        $perPage = $request->get('perPage');
        $courses = Course::upcoming($perPage);
        return $courses->toJson();
    }

    /**
     * Devuelve un json con las clases recomendadas
     */
    public function recommended(Request $request){
//        $page = $request->get('page');
        $perPage = $request->get('perPage');
//        return Course::recommended()->forPage($page, $perPage)->all();
        return Course::recommended($perPage);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
//        $this->authorize('create', CourseCard::class);

        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCourse $request)
    {
        $course = new Course();

        $course->fill($request->all('name', 'date_time', 'short_description', 'long_description', 'duration_mins',
            'max_enrollments', 'price', 'access_link'));

        $platform = Platform::name($request->get('platform_name'));
        if (!is_null($platform))
            $course->platform()->associate($platform);

        $course->teacher()->associate(Auth::user());
        $course->save();

        return redirect()->action('HomeController@index')->with('message', 'La clase se ha registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        //
        $course = Course::findOrFail($id);

        // Agrega credenciales
        SDK::setAccessToken(env('MP_ACCESS_TOKEN'));

        // Crea un objeto de preferencia
        $preference = new Preference();

        // Crea un ítem en la preferencia
        $item = new Item();
        $item->title = $course->name;
        $item->quantity = 1;
        $item->unit_price = $course->price;
        $item->unit_price = 'ARS';
        $preference->items = array($item);
        $preference->save();

        return view('courses.show')->with('course', $course)->with('preference', $preference);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
