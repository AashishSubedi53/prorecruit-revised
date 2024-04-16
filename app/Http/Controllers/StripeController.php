<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout(){
        return view('livewire.checkout');
    }

    public function session(Request $request){
        Stripe::setApiKey(config('stripe.sk'));
    }
}
