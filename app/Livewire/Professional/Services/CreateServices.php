<?php

namespace App\Livewire\Professional\Services;

use App\Models\Professional\ProfessionalService;
use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;


class CreateServices extends Component
{

    public $categories = [];
    public $services = [];

    public string $selectedCategory = '';
    public string $selectedService  = '';
    public string $selectedTimeFrom = '';
    public string $selectedTimeTo = '';
    public string $price = '';
    public string $serviceDescription = '';

    protected $rules = [
        'selectedCategory' => 'required',
        'selectedService' => 'required',
        'selectedTimeFrom' => 'required',
        'selectedTimeTo' => 'required',
        'price' => 'required|numeric|gt:0',
        'serviceDescription' => ['required', 'min:10', 'max:500'],
    ];

    public function updated($property){
        $this->validateOnly($property);
    }


    public function mount(){
        $this->categories = ServiceCategory::all();
    }

    public function changeCategory(){
        if($this->selectedCategory != -1){
            $this->services = Service::where('service_category_id', $this->selectedCategory)->get();
        }
    }

    public function submit(){
        // $this->validate();
        ProfessionalService::create([
            'service_category_id' => $this->selectedCategory,
            'service_id' => $this->selectedService,
            'business_hours_start' => $this->selectedTimeFrom .'am' ,
            'business_hours_end' => $this->selectedTimeTo . 'pm',
            'price' => $this->price,
            'description' => $this->serviceDescription,
            'professional_id' => auth()->user()->professional->id,
        ]);
        $this->reset();
        // return redirect()->route('professional.my-services.index');

        session()->flash('success', 'Services added successfully!!');        
    }

    public function render()
    {
        return view('livewire.professional.services.create-services')
        ->extends('layouts.users.app')
        ->section('content');
    }
}
