<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function checkout(Request $request){
        $request->request->add(['status' => 'Belum dibayar']);
        $res = $request->all();
        $order = Order::create($res);
        // dd($res);

                
        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'item_details' => array(
                ['id' => 'a1', 'quantity' => 1,'name' => 'apel','price' => 20000],
                ['id' => 'a2','quantity' => 1,'name' => 'jeruk','price' => 15000],
            ),
            'customer_details' => array(
                'first_name' => $order->name,
            
                'email' => 'budi.pra@example.com',
                'phone' => $order->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        $ServerKey = config('midtrans.server_key');
        $hashesd = hash("SHA512", $request->order_id.$request->status_code.$request->gross_amount.$ServerKey);
        if($hashesd == $request->signature_key)
        {
            if($request->transaction_status == 'capture'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
            if($request->transaction_status == 'settlement'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
            if($request->transaction_status == 'pending'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Menunggu Pembayaran']);
            }
        }
    }
        
    
}
