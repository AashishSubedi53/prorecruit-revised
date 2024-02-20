<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
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

        Customer::create([
            'user_id' => $sanitized['user_id'],
            'first_name' => $sanitized['first_name'],
            'last_name' => $sanitized['last_name'],
            'address' => $sanitized['address'],
            'phonenumber' => $sanitized['phonenumber'],
            'profile_image' => $sanitized['profile_image']
        ]);

        return redirect()->route('admin.customers.index')->with('success', 'A Customer is added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $sanitized = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'username' => ['required'],
            'address' => ['required'],
            'phonenumber' => ['required'],
            'profile_image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'unique:users,email,' . $customer->user_id],
            'password' => ['required'],
            'user_type' => ['required']
        ]);

        $sanitized['password'] = Hash::make($sanitized['password']);

        User::find($customer->user_id)->update([
            'username' => $sanitized['username'],
            'email' => $sanitized['email'],
            'password' => $sanitized['password'],
            'user_type' => $sanitized['user_type']
        ]);

        $customer->update([
            // 'user_id' => $sanitized['user_id'],
            'first_name' => $sanitized['first_name'],
            'last_name' => $sanitized['last_name'],
            'address' => $sanitized['address'],
            'phonenumber' => $sanitized['phonenumber'],
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            $customer->update(['profile_image' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Customer information updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer -> delete();
        return redirect()->back()->with('success', 'Customer is deleted !');
    }
}
