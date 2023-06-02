<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class providerController extends Controller
{
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {

        try {
            $socialUser = Socialite::driver($provider)->user();
            // dd($socialUser); 

            if (User::where('email', $socialUser->getEmail)->exists()) {
                return redirect('/login')->withErrors(['email' => 'This Email Uses Different Method to Login!']);
            }

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
            ])->first();

            if (!$user) {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'username' => User::generateUsername($socialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $socialUser->getId(),
                    'provider_token' => $socialUser->token,
                    'email_verified_at' => now(),
                ]);

            }
                Auth::login($user);
    
                return redirect('/home');

            


        } catch (\Exception $e) {
            return redirect('/login')->with('message', 'Something Went Wrong, Please Try again!');
            // dd($e);
        }
        
           
        }
}
