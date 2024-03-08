<?php

namespace App\Livewire\Customer;

use App\Models\Professional;
use App\Models\Professional\ProfessionalService;
use App\Models\Service;
use Livewire\Component;

class SearchProfessionals extends Component
{

    public $professionalServices = [];
    public $services = [];
    public $selectedServices = [];
    public $selectedLocation;



    public function mount(){
        // $this->professionalServices = ProfessionalService::all();
        $this->professionalServices = ProfessionalService::with('professional.user', 'professional.address')->get();
        $this->services = Service::all();
    } 

    public function filterByService()
    {
        $this->professionalServices = ProfessionalService::with('professional.user', 'professional.address')
            ->when($this->selectedServices, function ($query, $selectedServices) {
                return $query->whereIn('service_id', $selectedServices);
            })
            ->get();
    }

    // public function filterByLocation()
    // {
    //     $this->professionalServices = ProfessionalService::with('professional.user', 'professional.address')
    //         ->when($this->selectedLocation, function ($query, $selectedLocation) {
    //             return $query->whereHas('professional.address', function ($addressQuery) use ($selectedLocation) {
    //                 $addressQuery->whereIn('city', $selectedLocation);
    //             });
    //         })
    //         ->get();
    // }

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
