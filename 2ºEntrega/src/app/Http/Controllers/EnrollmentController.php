<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class EnrollmentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function enroll($courseId)
    {
        $course = Course::findOrFail($courseId);
        $course->free_spots = $course->max_enrollments; // TODO Calcular lugares libres
        // Agrega credenciales
        SDK::setAccessToken(env('MP_ACCESS_TOKEN'));

        // Crea un objeto de preferencia
        $preference = new Preference();

        // Crea un ítem en la preferencia
        $item = new Item();
        $item->title = $course->name;
        $item->quantity = 1;
        $item->unit_price = $course->price;
        $item->currency_id = 'ARS';
        $preference->items = array($item);
        $preference->save();

        return view('courses.show')->with('course', $course)->with('preference', $preference);

    }
}
