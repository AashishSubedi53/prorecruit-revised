<?php

namespace App\Livewire\Professional\Services;

use App\Models\Professional\ProfessionalService;
use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;

class EditServices extends Component
{
    public $proService;
    public $categories = [];
    public $services = [];
    public $selectedCategory;
    public $selectedService;
    public $selectedTimeFrom;
    public $selectedTimeTo;
    public $price;
    public $serviceDescription;

    protected $rules = [
        'selectedCategory' => 'required',
        'selectedService' => 'required',
        'selectedTimeFrom' => 'required',
        'selectedTimeTo' => 'required',
        'price' => 'required|numeric|gt:0',
        'serviceDescription' => ['required', 'min:10', 'max:500'],
    ];

    public function mount(ProfessionalService $proService){
        $this->proService = $proService;
        // dd($proService);
        $this->categories = ServiceCategory::all();
        $this->selectedCategory = $this->proService->service_category_id;
        $this->selectedService = $this->proService->service_id;
        $this->price = $this->proService->price;
        $this->serviceDescription = $this->proService->description;
        $this->selectedTimeFrom = $this->proService->business_hours_start;
        $this->selectedTimeTo = $this->proService->business_hours_end;
    }

    public function changeCategory(){
        if($this->selectedCategory != -1){
            $this->services = Service::where('service_category_id', $this->selectedCategory)->get();
        }
    }

    public function updated($property){
        $this->validateOnly($property);
    }

    public function update(){
        $proService = ProfessionalService::find($this->proService->id);
        $proService->update([
            'service_category_id' => $this->selectedCategory,
            'service_id' => $this->selectedService,
            'business_hours_from' => $this->selectedTimeFrom,
            'business_hours_to' => $this->selectedTimeTo,
            'price' => $this->price,
            'description' => $this->serviceDescription,
        ]);
        session()->flash('success', 'Service updated successfully!');
        // return redirect()->route('professional.my-services.index');
        // $this->mount($proService);
       

    }

    public function render()
    {
        return view('livewire.professional.services.edit-services')
        ->extends('layouts.users.app')
        ->section('content');
    }
}
