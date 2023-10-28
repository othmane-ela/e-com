<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Psr7\ServerRequest;

use Illuminate\Support\Facades\File;

class WebhookController extends Controller
{
    public function index(Request $request)
    {
        $request = ServerRequest::fromGlobals();
        $signature = $request->getHeaderLine('stripe-signature');
        $body = $request->getBody()->getContents();
    
        $stripe = new \Stripe\StripeClient('sk_test_51HMfgNFZq0a40mi58xQQ5OHvADii1t4KPAkqQqZsPP7z2f5RQ42W2QFWm0PWkGOEmsR9zIZ9K4IhCYrl4m0UTOXL00jkQrbsyf');
        $endpoint_secret = 'whsec_7291df3e84d515f08628a93c906480e40cc38ecbde401de2977ba94e52b91c83';
    
        try {
            $event = \Stripe\Webhook::constructEvent(
                $body, $signature, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }
    
        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                    $filePath = storage_path('app/jsondata.json');
                    // Convert the data to JSON
                    $jsonData = json_encode($paymentIntent, JSON_PRETTY_PRINT);
                    // Write the JSON data to the file
                    File::put($filePath, $jsonData);
                // Handle the payment_intent.succeeded event
                // You can add your custom code here.
                break;
            default:
                echo 'Received unknown event type ' . $event->type;
        }
    }
}
