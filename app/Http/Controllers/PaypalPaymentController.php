<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

// use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalPaymentController extends Controller
{
    //
    /* public function handelPayment()
    {
        $provider = new PayPalClient;
    }*/
    public function handelPayment()
    {
        $userId = auth()->user()->id;

        $data = [];
        $data['items'] = [];

        // add cart items in $data[items] array
        foreach (\Cart::session($userId)->getContent() as $item) {
            array_push($data['items'], [
                'name' => $item->name,
                'price' => (int)($item->price / 9),
                'desc'  =>  $item->associatedModel->description,
                'qty' => $item->quantity
            ]);
        }
        $data['invoice_id'] = auth()->user()->id;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('success.payment');
        $data['cancel_url'] = route('cancel.payment');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }
        $data['total'] = $total;
        $paypalModule = new ExpressCheckout();

        $res = $paypalModule->setExpressCheckout($data);
        $res = $paypalModule->setExpressCheckout($data, true);

        return redirect($res['paypal_link']);
        $data = [];
        $data['items'] = [];
    }

    public function CancelPayment()
    {
        return redirect()->route('cart.index')->with([
            'info' => "You have declined the payment.",
        ]);
    }

    public function SuccessPayment(Request $request)
    {
        $userId = auth()->user()->id;
        $paypalModule = new ExpressCheckout;
        $reponse = $paypalModule->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($reponse["ACK"]), ["SUCCESS", "SUCCESSWITHWARNING"])) {
            foreach (\Cart::session($userId)->getContent() as $item) {
                Order::create([
                    "user_id" => auth()->user()->id,
                    "menu_name" => $item->name,
                    "qte" => $item->quantity,
                    "price" => $item->price,
                    "total" => $item->price * $item->quantity,
                    "paid" => 1, //paid successfylly
                    'deliverde' => 0,

                ]);
                \Cart::session($userId)->Clear();
            }
            return redirect()->route('resto.index')->with([
                'success' => 'Payment has been made successfully.'
            ]);
        }
    }
}
