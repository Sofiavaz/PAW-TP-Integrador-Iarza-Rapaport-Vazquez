<?php

namespace App\Http\Controllers;

use App\Course;

use App\Enrollment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
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

        // TODO Si el usuario esta inscripto o es profesor no puede inscribirse de nuevo

        if ($course->teacher == Auth::user()) {
            return back()->with('error', 'No puede inscribirse a su propio curso.');
        }

        if ($course->attends(Auth::user())){
            return back()->with('error', 'No puede inscribirse dos veces al mismo curso');
        }

        // TODO Si quedan lugares libres devolver preference. Si no, vista muestra "agotado"

        // Agrega credenciales
        SDK::setAccessToken(env('MP_ACCESS_TOKEN'));

        // Crea un objeto de preferencia
        $preference = new Preference();

        // Crea un ítem en la preferencia
        $item = new Item();
        $item->id = $course->id;
        $item->title = $course->name;
        $item->quantity = 1;
        $item->unit_price = $course->price;
        $item->currency_id = 'ARS';
        $preference->items = array($item);

        $payer = new Payer();
        $payer->name = Auth::user()->name;
        $payer->email = Auth::user()->email;
        $preference->payer = $payer;

        $preference->back_urls = array(
            "success" => route('enrollments.successful'),
            "failure" => route('enrollments.failure'),
            "pending" => route('enrollments.pending')
        );

        $preference->save();

        return view('courses.show')->with('course', $course)->with('preference', $preference);
    }


    public function paymentSuccessful(Request $request){

        // Pido a MP la preference
        SDK::setAccessToken(env('MP_ACCESS_TOKEN'));
        $preference = Preference::find_by_id($request->get('preference_id'));

        if (!is_null($preference->id)) {

            // Reviso pago
            $order_id = $request->get('merchant_order_id');

            $order = MerchantOrder::find_by_id($order_id);

            if ($order->order_status == 'paid') {
                // Obtengo el id del curso
                $courseId = $preference->items[0]->id;

                $enrollment = new Enrollment();
                $enrollment->course_id = $courseId;
                $enrollment->user_id = Auth::user()->id;
                $enrollment->preference_id = $preference->id;

                $enrollment->save();

                return redirect()->action('HomeController@index')->with('message', 'Inscripción registrada con éxito.');
            }
            else {
                return redirect()->action('HomeController@index')->with('error', 'El pago no está aprobado.');
            }
        }

        return back()->with('error', 'Se produjo un problema con su inscripción...');

    }

    public function paymentFailure(Request $request){
        return back()->with('error', "No pudimos procesar su pago...");
    }

    public function paymentPending(){

    }


}
