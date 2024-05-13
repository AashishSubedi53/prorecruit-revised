<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use App\Models\ProfessionalAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professionals = Professional::paginate(10);
        return view('admin.professionals.index', compact('professionals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.professionals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'phonenumber' => ['required'],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'user_type' => ['required'],
            'address_line_1' => ['required'],
            'address_line_2' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
        ]);

        $sanitized['password'] = Hash::make($sanitized['password']);

        $user = User::create([
            'username' => $sanitized['username'],
            'email' => $sanitized['email'],
            'password' => $sanitized['password'],
            'user_type' => $sanitized['user_type']
        ]);

        $sanitized['user_id'] = $user->id;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            $sanitized['profile_image'] = $imagePath;
        }

        $professional = Professional::create([
            'user_id' => $sanitized['user_id'],
            'first_name' => $sanitized['first_name'],
            'last_name' => $sanitized['last_name'],
            'phonenumber' => $sanitized['phonenumber'],
            'profile_image' => $sanitized['profile_image']
        ]);

        $sanitized['professional_id'] = $professional->id;
        
        try {
            ProfessionalAddress::create([
                'professional_id' => $sanitized['professional_id'],
                'address_line_1' => $sanitized['address_line_1'],
                'address_line_2' => $sanitized['address_line_2'],
                'province' => $sanitized['province'],
                'city' => $sanitized['city'],
                'postal_code' =>  $sanitized['postal_code']
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('success', 'An error occurred while saving the professional address.');
        }

        return redirect()->route('admin.professionals.index')->with('success', 'A Professional is added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professional $professional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professional $professional)
    {
        $provinceOptions = ['Province 1', 'Madhesh Pradesh', 'Bagmati Province', 'Gandaki', 'Lumbini', 'Karnali', 'Sudurpaschim'];        
        return view('admin.professionals.edit', compact(['professional', 'provinceOptions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Professional $professional)
    {
        $sanitized = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'phonenumber' => ['required'],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'unique:users,email,' . $professional->user_id],
            'password' => ['required'],
            'user_type' => ['required'],
            'address_line_1' => ['required'],
            'address_line_2' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
        ]);
        
        $sanitized['password'] = Hash::make($sanitized['password']);

        User::find($professional->user_id)->update([
            'username' => $sanitized['username'],
            'email' => $sanitized['email'],
            'password' => $sanitized['password'],
            'user_type' => $sanitized['user_type']
        ]);

        // $sanitized['user_id'] = $user->id;

        $professional->update([
            // 'user_id' => $sanitized['user_id'],
            'first_name' => $sanitized['first_name'],
            'last_name' => $sanitized['last_name'],
            'phonenumber' => $sanitized['phonenumber'],
        ]);

        $professional->address->update([
            'address_line_1' => $sanitized['address_line_1'],
            'address_line_2' => $sanitized['address_line_2'],
            'province' => $sanitized['province'],
            'city' => $sanitized['city'],
            'postal_code' =>  $sanitized['postal_code']
        ]);
        
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            $professional->update(['profile_image' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Professional information updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professional $professional)
    {
        $professional -> delete();
        return redirect()->back()->with('success', 'Professional is deleted !');
    }
}
