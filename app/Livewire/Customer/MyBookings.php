<?php

namespace App\Livewire\Customer;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyBookings extends Component
{
    public $orders = [];
    public $service_image;
    public $service_name;
    public $bookingDate;
    public $bookingTime;
    public $payment_method;
    public $totalPayment;
    public $payment_status;
    public $order_status;
    public $professional_id;

    public function mount(){
        // $this->orders = Order::where('customer_id',Auth::user()->customer->id)->get();
        $this->orders = Order::with('professionalService')->where('customer_id', Auth::user()->customer->id)->get();
        // PaginationUrl
        // Paginator
        



        foreach ($this->orders as $order) {
            // Assuming Service model has a method to fetch image based on service id
            // $service = Service::find($order->proService->service->id);
            // $this->service_image[] = $service->getImage(); // Assuming getImage() method exists

            // Assigning other properties
            // $this->service_name[] = $order->proService->service->name;
            // $this->bookingDate[] = $order->bookingDate;
            // $this->bookingTime[] = $order->bookingTime;
            // $this->payment_method[] = $order->payment_method;
            // $this->totalPayment[] = $order->totalPayment;
            // $this->payment_status[] = $order->payment_status;
            // $this->order_status[] = $order->order_status;

            // dd($order->proService);
        }
        
        // dd($this->orders);
    }

    public function professionalProfile($professional_id){
        return redirect('/customer/professional-details/' . $professional_id);
    }

     

    public function render()
    {
        return view('livewire.customer.my-bookings')
        ->extends('layouts.users.app')
        ->section('content');
        
    }
}
