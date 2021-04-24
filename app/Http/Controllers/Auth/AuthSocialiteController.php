<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthSocialiteController extends Controller
{
    public function handleRedirect($provider){
        $authType = session("auth_type");
        return redirect("/{$authType}/{$provider}/callback");
    }
}
