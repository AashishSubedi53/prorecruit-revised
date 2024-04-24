<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serviceCategories = ServiceCategory::all();
        return view('admin.services.create', compact('serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ServiceCategory $serviceCategory)
    {
        // dd($request->all());
        $sanitized = $request->validate([
            'service_name' => ['required'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'service_category_id' => ['required']
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('service-images', 'public');
            $sanitized['image'] = $imagePath;
        }

        Service::create([
            'service_category_id' => $sanitized['service_category_id'],
            'service_name' => $sanitized['service_name'],
            'image' => $sanitized['image']
        ]);

        return redirect()->route('admin.services.index')->with('success', 'A Service is added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $serviceCategories = ServiceCategory::all();
        return view('admin.services.edit', compact('service','serviceCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

        // dd($request->all());
        $sanitized = $request->validate([
            'service_name' => ['required'],
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'service_category_id' => ['required']
        ]);

        $service->update([
            'service_category_id' => $sanitized['service_category_id'],
            'service_name' => $sanitized['service_name'],
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('service-images', 'public');
            $service->update(['image'=>$imagePath]);
        }

        

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Service deleted successfully!');
    }
}
