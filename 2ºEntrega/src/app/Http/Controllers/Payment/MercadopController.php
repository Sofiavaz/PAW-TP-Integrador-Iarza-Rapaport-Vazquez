<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;

class MercadopController extends Controller {
    
    public function prueba ($courseid){
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
<form action="{{route('Mercadop.prueba')}}" method="POST">
  <script
   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>
