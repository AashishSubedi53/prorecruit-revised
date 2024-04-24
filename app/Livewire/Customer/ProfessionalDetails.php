<?php

namespace App\Livewire\Customer;

use App\Models\Professional;
use App\Models\Professional\Gallery;
use App\Models\Professional\ProfessionalService;
use App\Models\RatingAndReview;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProfessionalDetails extends Component
{
    public $professional;
    public $images = [];
    public $proServices = [];
    public $selectProfessionalService;
    public $reviews = [];
    public $averageRating;
    public $rating = 0;
    public $comments = '';
    public $totalRatings;

    // modal data
    public $bookingDetails;
    public $bookingDate;
    public $bookingTime;
    public $selectedService;
    public $address;
    public $city;
    public $pin_code;
    public $additionalDetails;


    public function mount(Professional $professional){
        $this->professional = $professional;
        $this->images = Gallery::where('professional_id', $professional->id)->get();
        $this->proServices = ProfessionalService::where('professional_id', $professional->id)->get();
        $this->reviews = RatingAndReview::where('professional_id', $professional->id)->get();
        // dd($professional->service);
        $this->averageRating = $this->calculateAverageRating();
        $this->totalRatings = $this->professional->ratingAndReview->count();
    }

    public function submit(){
        $this->bookingDetails = [
            "bookingDate" => $this->bookingDate,
            "bookingTime" => $this->bookingTime,
            "address" => $this->address,
            "city" => $this->city,
            "pin_code" => $this->pin_code,
            "additionalDetails" => $this->additionalDetails,
            // "proServiceId" => $this->proServiceId
        ];

        session(['proServiceId' => $this->selectedService]);

        $this->sessionStorage();
        return redirect()->route('customer.checkout');

    }

    public function sessionStorage(){
        return session(['bookingDetails' => $this->bookingDetails]);
    }

    protected $rules = [
        'comments' => ['required', 'min:10', 'max:500']
    ];

    // protected function calculateAverageRating()
    // {
    //     // dd($this->professional);
    //     $totalRatings = $this->professional->ratingAndReview->count();
    //     $totalStars = $this->professional->ratingAndReview->sum('stars');
    //     $this->averageRating = $totalRatings > 0 ? $totalStars / $totalRatings : 0;
    // }

    public function calculateAverageRating()
    {
        $averageRating = DB::table('rating_and_reviews')
            ->where('professional_id', $this->professional->id)
            ->avg('stars');

        return round($averageRating, 1);
    }


    public function updated($property){
        $this->validateOnly($property);
    }

    public function rate($value)
    {
        $this->rating = $value;
        // dd($this->rating);
    }

    public function saveRatings(){
        // dd($this->all());
        RatingAndReview::create([
            'stars' => $this->rating,
            'comments' => $this->comments,
            'customer_id' => Auth::user()->customer->id,
            'professional_id' => $this->professional->id,
            'professional_service_id' => $this->selectProfessionalService

        ]);

        $this->reset(['rating', 'comments', 'selectProfessionalService']);
    }

    public function render()
    {
        return view('livewire..customer.professional-details',
        ['averageRating' => $this->averageRating])
        ->extends('layouts.users.app')
        ->section('content');
    }
}
