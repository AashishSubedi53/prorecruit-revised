<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Professional;
use App\Models\SiteSetting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $userType = $request->input('user_type', 'customer');

        if ($userType === 'professional') {
            $siteSetting = SiteSetting::first();
            $imagePath = $siteSetting->homepage_banner;
            return view('auth.register-professional', ['imagePath' => $imagePath]);
        } else {
            $siteSetting = SiteSetting::first();
            $imagePath = $siteSetting->homepage_banner;
            return view('auth.register-user', ['imagePath' => $imagePath]);
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_type' => ['required']
            ]);
        $userType = $request->user_type;


        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $userType
        ]);

        
            // $imagePath = $request->file('profile_image')->store('profile-images', 'public');
            // $sanitized['profile_image'] = $imagePath;
        

        
        if ($userType === 'customer') {
            Customer::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'phonenumber' => $request->phonenumber,
                'profile_image'
            ]);
        } elseif ($userType === 'professional') {
            Professional::create([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address_line_1' => $request->address_line_1,
                'address_line_2' => $request->address_line_2,
                'province' => $request->province,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'phonenumber' => $request->phonenumber,
                'profile_image'
            ]);

        }       


        event(new Registered($user));

        Auth::login($user);      


        // return redirect(RouteServiceProvider::HOME);
        return redirect(RouteServiceProvider::redirectTo());
    }
}



