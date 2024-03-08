<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class ProfessionalDetails extends Component
{
    public function render()
    {
        return view('livewire..customer.professional-details')
        ->extends('layouts.users.app')
        ->section('content');
    }
}
