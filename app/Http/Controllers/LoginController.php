<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider){
        $user = Socialite::driver($provider)->user();
        $user = User::firstWhere("email",$user->getEmail());
        Auth::login($user);

    }
}
