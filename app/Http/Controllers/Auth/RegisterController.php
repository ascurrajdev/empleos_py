<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Traits\ResponseTrait;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\ValidationException;
use App\Services\{UserService, AuthProviderUserService};

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers,ResponseTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    private $userService,$authProviderUserService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->userService = resolve(UserService::class);
        $this->authProviderUserService = resolve(AuthProviderUserService::class);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 1
        ]);
    }

    public function redirectToProvider($provider,Request $request){
        session([
            "auth_type" => "register"
        ]);
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallbackProvider($provider){
        $user = Socialite::driver($provider)->user();
        $parameters = array();
        $parameters["name"] = $user->getName();
        $parameters["email"] = $user->getEmail();
        $parameters["password"] = $provider;
        $userModel = $this->userService->create($parameters);
        if(!$this->authProviderUserService->syncUserWithProvider($userModel,$provider)){
            throw ValidationException::withMessages([
                'email' => ""
                ]);
            }
        Auth::login($userModel);
        return redirect($this->redirectTo);
    }

    public function handleRegisterSanctum(Request $request){
        Validator::make($request->all(),[
            "name" => ["required","string","max:255"],
            "email" => ["required","string","email","unique:users"],
            "password" => ["required","string","min:8"],
            "device_name" => ["string"] 
        ])->validate();
        $user = $this->create($request->only(['name','email','password']));
        $tokenUser = $user->createToken($request->device_name);
        return $this->success($tokenUser->plainTextToken);
    }
}
