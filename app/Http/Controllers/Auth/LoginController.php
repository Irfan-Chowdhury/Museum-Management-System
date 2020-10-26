<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (count(User::all()) == 0) {
            $admin          = new User();
            $admin->name    = 'Admin';
            $admin->email   = 'admin@gmail.com';
            $admin->phone   = '1829498634';
            $admin->address = 'Chittagong';
            $admin->role    = 'super-admin'; 
            $admin->password= Hash::make('admin@gmail.com');
            $admin->save();

            return redirect()->back();
        }

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        //New Logic Added - "Super-Admin" & "sub-admin" can access but "User" Cann't access .
        if ($this->attemptLogin($request)) {
            if ((auth()->user()->role == "super-admin") || (auth()->user()->role == "sub-admin")) 
            {
                // return redirect()->route('admin.home');
                return $this->sendLoginResponse($request);
            }
            elseif (auth()->user()->role == "user") {
                return redirect()->route('login')->send();
            }            
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return $this->loggedOut($request) ?: redirect('/');
        return $this->loggedOut($request) ?: redirect('/login');
    }
}
