<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        //SAMPLE REQUEST START HERE

// Set your Merchant Server Key
// \Midtrans\Config::$serverKey = 'SB-Mid-server-5coNcjgSJpaaXPv3eyJxqL6F';
\Midtrans\Config::$serverKey = config('midtrans.server_key');
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => 2000,
        'gross_amount' => 10000,
    ),
    'item_details' => array(
        ['id' => 'a1', 'quantity' => 1,'name' => 'apel','price' => 20000],
        ['id' => 'a2','quantity' => 1,'name' => 'jeruk','price' => 15000],
    ),
    'customer_details' => array(
        'first_name' => 'budi',
        'last_name' => 'pratama',
        'email' => 'budi.pra@example.com',
        'phone' => '08111222333',
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
// dd($snapToken);
return view('welcome',['snap_token' => $snapToken]);
    }
}
