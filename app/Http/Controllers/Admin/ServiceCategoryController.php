<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceCategories = ServiceCategory::paginate(10);
        return view('admin.serviceCategories.index', compact('serviceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.serviceCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'category_name' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048']            
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('Service-Category-Images', 'public');
            $sanitized['image'] = $imagePath;
        }

        ServiceCategory::create([
            'category_name' => $sanitized['category_name'],
            'image' => $sanitized['image']
        ]);

        return redirect()->route('admin.serviceCategories.index')->with('success', 'Service Category added successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.serviceCategories.edit', compact('serviceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $sanitized = $request->validate([
            'category_name' => ['required', 'string', 'unique:service_categories,category_name'],
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048']            
        ]);

        $serviceCategory->update([
            'category_name' => $sanitized['category_name'],
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('Service-Category-Images', 'public');
            $serviceCategory->update(['image' => $imagePath]);
        }

        return redirect()->route('admin.serviceCategories.index')->with('success', 'Service Category added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();
        return redirect()->back()->with('success', 'Service Category is deleted successfully!');
    }
}
