<?php

namespace App\Http\Controllers;
error_reporting(E_ALL);
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
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
            // $redirectTo = RouteServiceProvider::redirectTo();  yes maa chai variable banauda call hune raixa ...call huda user null huda user_type null dekhayo
            $user = User::where('google_id', $google_user->getId())->first();
            if(!$user){
                $new_user = User::create([
                    'username' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id'=> $google_user->getId(),  
                    'user_type' => session('user_type')    
                    
                ]);
                Auth::login($new_user);
                return redirect(RouteServiceProvider::redirectTo());
                
            } else{
                Auth::login($user); 
                return redirect(RouteServiceProvider::redirectTo());

            }

            
        }
        catch(Exception $ex){
            // return redirect("/");
        }

    }

    // public function callbackGoogle(){
    //     $google_user = Socialite::driver('google')->user();

    //     $user = User::updateOrCreate([
    //         'google_id' => $google_user->id,

    //     ],
    //     [
    //         'username' => $google_user->name,
    //         'email' => $google_user->email,

    //     ]);

    //     Auth::login($user);
    //     return redirect();
    // }
}


