<?php

namespace App\Livewire;

use Livewire\Component;

class Checkout extends Component
{
    public function render()
    {
        return view('livewire.checkout')
        ->extends('layouts.users.app')
        ->section('content');
    }
}
