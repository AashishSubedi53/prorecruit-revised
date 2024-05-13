<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Professional;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthController extends Controller
{
    public function googleLogin(){
        session(['user_type' => request('user_type')]);
        return Socialite::driver('google')->redirect();      

    }


    public function callbackGoogle(Request $request){
        try{    
            $google_user = Socialite::driver('google')->user();
            // $redirectTo = RouteServiceProvider::redirectTo();  
            $user = User::where('google_id', $google_user->getId())->first();
            if(!$user){
                $new_user = User::create([
                    'username' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id'=> $google_user->getId(), 
                    // 'password' => Hash::make('password'), 
                    'user_type' => session('user_type'),
                        
                    
                ]);

                if(session('user_type') === 'customer'){
                    Customer::create([
                        'user_id' => $new_user->id,
                        'first_name' => $google_user->user['given_name'],
                        'last_name' => $google_user->user['family_name'],
                        'address' => 'Address',
                        'phonenumber' => '98xxxxxxxx',
                        'profile_image' => '/profile-images/default-profile.png'
                        
                    ]);

                   
                }else{
                    
                    
                }
                Auth::login($new_user);
                if(session('user_type')==='customer'){
                    return redirect()->route('home');
                }
                return redirect(RouteServiceProvider::redirectTo());
                // return redirect()->url('/');
                
            } else{
                Auth::login($user); 
                return redirect(RouteServiceProvider::redirectTo());
                // return redirect()->route('home');

            }
            
        }
        catch(Exception $ex){
            return redirect("/");
        }

    }

}


