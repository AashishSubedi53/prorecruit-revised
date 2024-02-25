<?php

namespace App\Http\Controllers\Professional;

use App\Http\Controllers\Controller;
use App\Models\Professional\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('Professional.Gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images = $request->file('images');
        foreach ($images as $key => $img) {
            $multiimageName = time() . '_' . $key . '.' . $img->getClientOriginalExtension();
            $uploadPath = $img->storeAs('gallery-images', $multiimageName, 'public');


            Gallery::create([
                'professional_id' => Auth::user()->professional->id,
                'url' => $uploadPath,
                'alt' => 'test'
            ]);
        }
    
        return redirect()->route('professional.gallery.index')->with('success', 'Images uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
