<?php

namespace App\Livewire\Customer;

use App\Models\Message;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyBookings extends Component
{
    public $orders = [];
    public $customer_id;
    public $service_image;
    public $service_name;
    public $bookingDate;
    public $bookingTime;
    public $message;
    public $payment_method;
    public $totalPayment;
    public $payment_status;
    public $order_status;
    public $professional_id;

    public function mount(){
        // $this->orders = Order::where('customer_id',Auth::user()->customer->id)->get();
        $this->orders = Order::with('professionalService')->where('customer_id', Auth::user()->customer->id)->get();
        
        }

    public function professionalProfile($professional_id){
        return redirect('/customer/professional-details/' . $professional_id);
    }

    public function sendMessage(){
        $message = Message::create([
            'sender_id' => Auth::user()->customer->id,
            'receiver_id' => $this->professional_id,
            'message' => $this->message
        ]);

        session()->flash('success', 'Message sent successfully!');


        return redirect()->route('customer.my-bookings');        
        
    }

    public function cancelBooking($orderId){
        $order = Order::find($orderId);
        if ($order) {
            $order->delete();
            session()->flash('success', 'Booking canceled !');
            return redirect()->route('customer.my-bookings');
        }
    }

     

    public function render()
    {
        return view('livewire.customer.my-bookings')
        ->extends('layouts.users.app')
        ->section('content');
        
    }
}
