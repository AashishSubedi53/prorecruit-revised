<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use App\Models\User;
use Illuminate\Http\Request;
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
            'address' => ['required'],
            'phonenumber' => ['required'],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'user_type' => ['required']
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

        Professional::create([
            'user_id' => $sanitized['user_id'],
            'first_name' => $sanitized['first_name'],
            'last_name' => $sanitized['last_name'],
            'address' => $sanitized['address'],
            'phonenumber' => $sanitized['phonenumber'],
            'profile_image' => $sanitized['profile_image']
        ]);

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
        
        return view('admin.professionals.edit', compact('professional'));
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
            'address' => ['required'],
            'phonenumber' => ['required'],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'unique:users,email,' . $professional->user_id],
            'password' => ['required'],
            'user_type' => ['required']
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
            'address' => $sanitized['address'],
            'phonenumber' => $sanitized['phonenumber'],
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
