<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Livewire\Professional\Services;
use App\Models\Professional\ProfessionalService;
use App\Models\Professional\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Livewire\LivewireManager;

// class ProfessionalServiceController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         $professionalServices = ProfessionalService::where('professional_id', Auth::user()->professional->id)->get();
//         // dd($professionalServices);
//         return view('Professional.services.index', compact('professionalServices'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         // $serviceCategories = ServiceCategory::all();
//         return view('Professional.services.create');

       
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(ProfessionalService $service)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit()
//     {
//         return view('Professional.services.edit');
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, ProfessionalService $service)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(Request $request, ProfessionalService $service)
// {
//     $id = $request->id;
//     $service->findOrFail($id)->delete();
// }
// }
