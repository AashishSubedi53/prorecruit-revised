<?php

namespace App\Livewire\Customer;

use App\Models\Professional;
use App\Models\Professional\ProfessionalService;
use App\Models\Service;
use Illuminate\Http\Request;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class SearchProfessionals extends Component
{

    public $professionalServices = [];
    public $services = [];
    public $selectedServices = [];
    public $selectedLocation;
    public $enteredService;

    public $proServiceId;   


    // modal properties
    public $bookingDetails;
    public $bookingDate;
    public $bookingTime;
    public $address;
    public $city;
    public $pin_code;
    public $additionalDetails;



    public function mount(Request $request){
        $this->professionalServices = ProfessionalService::with('professional.user', 'professional.address')->get();
        $this->services = Service::all();
        $this->enteredService = session('enteredService') ?? $request->service;
        $this->checkSelectedServices();

        if ($this->enteredService) {
            $this->filterByService();
        }
    } 

    public function submit(){
        $this->bookingDetails = [
            "bookingDate" => $this->bookingDate,
            "bookingTime" => $this->bookingTime,
            "address" => $this->address,
            "city" => $this->city,
            "pin_code" => $this->pin_code,
            "additionalDetails" => $this->additionalDetails,
            "proServiceId" => $this->proServiceId
        ];


        $this->sessionStorage();
        return redirect()->route('customer.checkout');

    }

    public function sessionStorage(){
        return session(['bookingDetails' => $this->bookingDetails]);
    }
    

    public function checkSelectedServices()
    {
        
        $service = Service::where('service_name', $this->enteredService)->first();

        // If the service is found, set it as a selected service
        if ($service) {
            $this->selectedServices = [$service->id];
        }
    }

    public function filterByService()
    {
        $this->professionalServices = ProfessionalService::with('professional.user', 'professional.address')
            ->when($this->selectedServices, function ($query, $selectedServices) {
                return $query->whereIn('service_id', $selectedServices);
            })
            ->get();
    }

    public function filterByLocation()
    {
        $selectedLocation = is_array($this->selectedLocation) ? $this->selectedLocation : [$this->selectedLocation];

        $this->professionalServices = ProfessionalService::with('professional.user', 'professional.address')
            ->when($this->selectedLocation, function ($query) use ($selectedLocation) {
                return $query->whereHas('professional.address', function ($addressQuery) use ($selectedLocation) {
                    $addressQuery->where(function ($orQuery) use ($selectedLocation) {
                        foreach ($selectedLocation as $location) {
                            $orQuery->orWhere('city', 'like', '%' . $location . '%')
                                    ->orWhere('province', 'like', '%' . $location . '%')
                                    ->orWhere('address_line_1', 'like', '%' . $location . '%')
                                    ->orWhere('address_line_2', 'like', '%' . $location . '%')
                                    ->orWhere('postal_code', 'like', '%' . $location . '%');
                        }
                    });
                });
            })
            ->get();

        $this->reset('selectedLocation');
    }


    public function render()
    {
        return view('livewire..customer.search-professionals')
        ->extends('layouts.users.app')
        ->section('content');
    }
}
