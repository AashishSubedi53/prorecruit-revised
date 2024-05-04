<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()){
            return view('customer.profile.index');
        }else{
            return redirect()->route('home');
        }
        
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('customer.profile.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Customer $customer)
    {
        $sanitized = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'address' => ['required'],
            'phonenumber' => ['required'],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'unique:users,email,' . Auth::user()->id],
        ]);

        // dd($request->all());

        User::find(Auth::user()->customer->user_id)->update([
            'username' => $sanitized['username'],
            'email' => $sanitized['email'],
        ]);

        // $customer->update([
            Customer::find(Auth::user()->customer->id)->update([
            // 'user_id' => $sanitized['user_id'],
            'first_name' => $sanitized['first_name'],
            'last_name' => $sanitized['last_name'],
            'address' => $sanitized['address'],
            'phonenumber' => $sanitized['phonenumber'],
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            Customer::find(Auth::user()->customer->id)->update(['profile_image' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Information updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
