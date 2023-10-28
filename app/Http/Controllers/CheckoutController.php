<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function checkout(Request $request, $productId)
    {
        // Fetch the product info based on the $productId
        $product = Product::find($productId);
        $stripeSecretKey = 'sk_test_51HMfgNFZq0a40mi58xQQ5OHvADii1t4KPAkqQqZsPP7z2f5RQ42W2QFWm0PWkGOEmsR9zIZ9K4IhCYrl4m0UTOXL00jkQrbsyf';
        Stripe::setApiKey($stripeSecretKey);
        Stripe::setApiVersion('2023-10-16');

        /// WEB HOOK
        $productId = $product->id;
        $urlimage = asset('storage/' . $product->image);

       $session =  Session::create([
        'line_items' => [
           ['quantity' => 1,
            'price_data' => [
                'currency' => 'EUR',
                'product_data' => [
                    'name' => $product->name,
                    'images' => [$urlimage]
                ],
                'unit_amount' =>  intval($product->price)
            ]  
           ]
            ],
         'mode' => 'payment',
         'success_url' => 'http://localhost:8000/success',
         'cancel_url' => 'http://localhost:8000/',
         'billing_address_collection' => 'required',
         'shipping_address_collection' => [
            'allowed_countries' => ['FR']
         ],
         'metadata' => [
           
         ]
         ]);
        return Redirect::to($session->url,303);
    }

    public function success(Request $request)
    {
        return view('checkout.success');
    }
}
