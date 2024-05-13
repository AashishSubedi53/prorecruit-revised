<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class KhaltiControllerCheck extends Component
{

    public function KhaltiCallback($order_id){
        
        $order = Order::find($order_id);
        $order->payment->payment_status = 'paid';
        $order->payment->save();
        
        return redirect()->route('customer.my-bookings')->with('success', 'Payment successfull !!');

    }
    
    public function render()
    {
        return view('livewire.khalti-controller-check');
    }
}
