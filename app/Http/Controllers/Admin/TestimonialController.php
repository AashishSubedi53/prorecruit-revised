<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Rules\WordCount;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'username' => 'required',
            'description' => ['required', new WordCount(50)],
            'user_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);


        if($request->hasFile('user_image')){
            $path = $request->file('user_image')->store('testimonials', 'public');
            $sanitized['user_image'] = $path;
        }

        Testimonial::create([
            'username' => $sanitized['username'],
            'description' => $sanitized['description'],
            'user_image' => $sanitized['user_image']
        ]);       

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $sanitized = $request->validate([
            'username' => 'required',
            'description' => ['required', new WordCount(50)],
            'user_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);


        if($request->hasFile('user_image')){
            $path = $request->file('user_image')->store('testimonials', 'public');
            // $sanitized['user_image'] = $path;
            $testimonial->update(['user_image'=>$path]);
        }

        $testimonial->update([
            'username' => $sanitized['username'],
            'description' => $sanitized['description'],
        ]);       

        return redirect()->back()->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial successfully deleted!');
    }
}
