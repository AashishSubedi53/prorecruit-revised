<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Professional\ProfessionalService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\On;
use Livewire\Component;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Stripe;

use function Laravel\Prompts\error;

class Checkout extends Component
{

    public $receivedBookingDetails;
    public $proService;

    // received from the modal
    public $proServiceId;
    public $bookingDate;
    public $bookingTime;
    public $address;
    public $city;
    public $pin_code;
    public $additionalDetails;


    public $service_name;
    public $service_price;
    public $totalProcessingFee;
    public $totalTax;
    public $serviceCharge;
    public $totalCharge = 0;

    // for khalti order
    public $customer_id;
    public $professionalService_id;
    public $professional_id;


    public function sessionReceiption(){
        return $this->receivedBookingDetails = session('bookingDetails');
    }

    public function __construct()
    {        

        $this->sessionReceiption();
        $this->bookingDate = $this->receivedBookingDetails['bookingDate'];
        $this->bookingTime = $this->receivedBookingDetails['bookingTime'];
        $this->address = $this->receivedBookingDetails['address'];
        $this->city = $this->receivedBookingDetails['city'];
        $this->pin_code = $this->receivedBookingDetails['pin_code'];
        $this->additionalDetails = $this->receivedBookingDetails['additionalDetails'];
        $this->proServiceId = $this->receivedBookingDetails['proServiceId'];
        
        

        // eager loading 
        $this->proService = ProfessionalService::with('service')->where('id', $this->proServiceId)->first();
        $this->service_name = $this->proService->service->service_name;           

        // $this->service_price = $this->proService->price;     
        $this->service_price = $this->proService->price;
        $this->totalProcessingFee = $this->service_price * 0.05;
        $this->totalTax = $this->service_price * 0.08;
        $this->serviceCharge = $this->service_price * 0.05;
        $this->totalCharge = $this->service_price + $this->totalProcessingFee + $this->totalTax + $this->serviceCharge;


        // for khalti orders
        $this->customer_id = Auth::user()->customer->id;
        $this->professionalService_id = $this->proService->id;
        $this->professional_id = $this->proService->professional_id;

    }

    

    public function bookingConfirm(Request $request){
        $total_charge = round($this->totalCharge);
        $two0 = '00';
        $total = $total_charge.$two0;
        $payment = Payment::create([
            'payment_status' => 'not paid',
            'payment_method' => 'Khalti Payment',
            'payment_amount' => $total,
            'refund_amount' => 0
    
        ]);
    
        $order = Order::create([
            'customer_id' => $this->customer_id,
            'professionalService_id' => $this->professionalService_id,
            'professional_id' => $this->professional_id,
            'payment_id' => $payment->id,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'bookingAddress' => $this->address,
            'city' => $this->city,
            'pin_code' => $this->pin_code,
            'additionalDetails' => $this->additionalDetails,
            'order_status' => 'Awaiting Completion'
    
        ]);

        return $this->KhaltiVerification($order->id);
        
    }

 
public function KhaltiVerification($order_id)
    {     
       
        
        $url = "https://a.khalti.com/api/v2/epayment/initiate/";
        
        
        setcookie('bookingDetails', json_encode(session('bookingDetails')));
        $requestBackURL = str_replace(" ", "","http://127.0.0.1:8000/khalti/callback/$order_id");
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
            "return_url": "'. $requestBackURL . '",
            "website_url": "http://127.0.0.1:8000",
            "amount": "1000",
            "purchase_order_id": "Order01",
            "purchase_order_name": "test",
            "customer_info": {
                "name": "ProRecruit",
                "email": "prorecruit@gmail.com",
                "phone": "9800000001"
            }
        }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: key a1e2e45362ba4ed8a04e56c1814ccb01',
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        

        curl_close($curl);

        $response_data = json_decode($response, true);

        if ($response_data && isset($response_data['payment_url'])) {
            return Redirect::to($response_data['payment_url']);
        } else {
            return "Error initiating payment.";
        }
    }

//     public function KhaltiCallback(Request $request) 
//     {
//         // dd($request->input('status'));
//         if($request->input('status') == 'Completed'){

//             $request->merge(session('khaltiPayment'));
//             $request->merge(["payment_method"=>"Khalti"]);
//             $request->merge(["payment_type" => "Khalti Online"]);
//             $this->OrderSuccess($request);
            
//             // $notification = array(
//             //     'message' => "Your Order Has Been Placed Successfully.",
//             //     'alert-type' => 'success'
//             // );

           
//             Session::forget('khaltiPayment');
//             // Notification::send($user, new OrderComplete($request->name));
     
//             return redirect()->route('customer.my-bookings');
//         }
//     }

   




    // public function StripeCheckout(){
    //     return view('livewire.checkout');
    // }

    public function session(Request $request){
        Stripe::setApiKey(config('stripe.sk'));

        $service_name = $this->service_name;
        $total_charge = round($this->totalCharge);
        $two0 = '00';
        $total = $total_charge.$two0;

        $session = CheckoutSession::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'NPR',
                        'product_data' => [
                            "name" => $service_name,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            // 'success_url' => route('customer.my-bookings'),
            'success_url' => route('customer.my-bookings'),
            session()->flash('success', 'Payment successfull !!'),
            'cancel_url' =>route('customer.checkout'),
            ]);

        // $message = '';
        // if (FacadesRoute::currentRouteName() === 'home') {
        //     $message = 'Payment Successful!!';
        // } elseif (FacadesRoute::currentRouteName() === 'customer.checkout') {
        //     $message = 'Payment failed!!';
        // }

    // Flashing message to session
    // Session::flash('message', $message);

    // if(FacadesRoute::currentRouteName() === 'customer.checkout'){
    //     dd('hello');
        $payment = Payment::create([
            'payment_status' => 'paid',
            'payment_method' => 'Stripe Payment',
            'payment_amount' => $total,
            'refund_amount' => 0

        ]);

        $order = Order::create([
            'customer_id' => Auth::user()->customer->id,
            'professionalService_id' => $this->proService->id,
            'professional_id' => $this->proService->professional_id,
            'payment_id' => $payment->id,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'bookingAddress' => $this->address,
            'city' => $this->city,
            'pin_code' => $this->pin_code,
            'additionalDetails' => $this->additionalDetails,
            'order_status' => 'Awaiting Completion'

        ]);


    // }

            return redirect()->away($session->url);
    }

    // public function success(){
    //     return "Thank you for your order. You have have just completed your payment. The professional will reach out to you soon!";
    // }

    public function render()
    {
        return view('livewire.checkout')
        ->extends('layouts.users.app')
        ->section('content');

       
    }


}
