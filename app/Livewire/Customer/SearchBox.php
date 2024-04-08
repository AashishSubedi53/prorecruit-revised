<?php

namespace App\Livewire\Customer;

use Livewire\Component;

class SearchBox extends Component
{

    public $enteredService;

    public function render()
    {
        return view('livewire..customer.search-box');
    }

    public function redirectTo(){
        return redirect()->route('customer.search-professionals.index')->with('enteredService', $this->enteredService);
    }
}
