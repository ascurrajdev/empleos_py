<?php

namespace App\Http\Controllers\Auth;

use Hash;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers,ResponseTrait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    private $userService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->userService = resolve(UserService::class);
    }

    public function redirectToProvider($provider){
        session([
            "auth_type" => "login"
        ]);
        return Socialite::driver($provider)->redirect();
    }


    public function handleCallbackProvider($provider){
        $user = Socialite::driver($provider)->stateless()->user();
        $user = User::firstWhere("email",$user->getEmail());
        auth()->login($user);
        return redirect(route("home"));
    }

    public function handleLoginSanctum(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);
        $user = $this->userService->getUserFromEmail($request->email);
        if(!$user || !Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([
                'email' => ['Las credenciales son incorrectas'],
            ]);
        }
        return $this->success($user->createToken($request->device_name)->plainTextToken);
    }
}
