<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $siteSettings = SiteSetting::firstOrFail();
        // return view('admin.settings.index', compact('siteSettings'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $siteSettings = SiteSetting::first();
    
        if (!$siteSettings) {
            $siteSettings = new SiteSetting();
            $siteSettings->save();
        }

        return view('admin.settings.edit', compact('siteSettings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        $sanitized = $request->validate([
            'phonenumber' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'instagram' => 'url',
            'tiktok' => 'url',
            'facebook' => 'url',
            'copyright' => 'required',
            'about_us_description' => 'required',
            'about_us_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'logo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'homepage_banner' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        // dd($request->all());

        $siteSettings = SiteSetting::firstOrFail(); 

        $siteSettings->update([
            'phonenumber' => $sanitized['phonenumber'],
            'address' => $sanitized['address'],
            'email' => $sanitized['email'],
            'instagram' => $sanitized['instagram'],
            'tiktok' => $sanitized['tiktok'],
            'facebook' => $sanitized['facebook'],
            'copyright' => $sanitized['copyright'],
            'about_us_description' => $sanitized['about_us_description'],
        ]);

        if ($request->hasFile('about_us_image')) {
            $imagePath = $request->file('about_us_image')->store('site-settings', 'public');
            $siteSettings->update(['about_us_image' => $imagePath]);
        }

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('site-settings', 'public');
            $siteSettings->update(['logo' => $imagePath]);
        }

        if ($request->hasFile('homepage_banner')) {
            $imagePath = $request->file('homepage_banner')->store('site-settings', 'public');
            $siteSettings->update(['homepage_banner' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Site settings updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteSetting $siteSetting)
    {
        //
    }
}
