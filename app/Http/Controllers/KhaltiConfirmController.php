<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class KhaltiConfirmController extends Controller
{
    public function KhaltiCallback($order_id){
        
        $order = Order::find($order_id);
        $order->payment->payment_status = 'paid';
        $order->payment->save();
        
        return redirect()->back();

    }
}
