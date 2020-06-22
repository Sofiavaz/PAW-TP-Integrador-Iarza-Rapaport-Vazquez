<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;

class MercadopController extends Controller {
    
    public function config ($courseid){
    // SDK de Mercado Pago
    require __DIR__ .  '/vendor/autoload.php';

    // Agrega credenciales
    MercadoPago\SDK::setAccessToken('PROD_ACCESS_TOKEN');

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;    
    $item->unit_price = 75.56;
    $preference->items = array($item);
    $preference->save();
    }
    
}
?>