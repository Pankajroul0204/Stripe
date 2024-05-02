<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request){
        // dd($request->all());
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
              'price_data' => [
                'currency' => 'inr',
                'product_data' => [
                  'name' => $request->product_name,
                ],
                'unit_amount' =>100 * $request->price,
              ],
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('failed'),
          ]);
           
          return redirect($checkout_session->url);
    }
}
