<?php

namespace App\Livewire\Professional\Services;

use App\Models\Professional\ProfessionalService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

use function Termwind\render;

class Index extends Component
{

    public $professionalServices = [];
    public $professionalId;

    public function mount(){
        $this->professionalId = Auth::user()->professional->id;
        $this->professionalServices = ProfessionalService::where('professional_id', $this->professionalId)->get();
    }

    public function delete($proServiceId)
    {
        $proService = ProfessionalService::find($proServiceId);

        if ($proService) {
            $proService->delete();
            $this->professionalServices = ProfessionalService::where('professional_id', $this->professionalId)->get();
            // session()->flash('success', 'Service deleted successfully!');
            redirect()->route('professional.my-services.index')->with('success', 'Service deleted successfully!');
        } else {
            // session()->flash('error', 'Service not found!');
            redirect()->route('professional.my-services.index')->with('success', 'Service not found!');

        }
    }

    public function render()
    {
        return view('livewire.professional.services.index')
        ->extends('layouts.users.app')
        ->section('content');
    }
}
