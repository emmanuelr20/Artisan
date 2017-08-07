<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\AccountType;
use App\User;

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

    /**
     * to enable the call of the trait function login from within the class after overide
     * by giving the function an alias
     */
    use AuthenticatesUsers {
        login as protected traitLogin;
    }

    /**
     * for usrname function vlaidation
     *
     * @var string
     */
    protected $loginCredential;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $clientType = AccountType::where('name', 'client')->first()->id;
        $artisanType = AccountType::where('name', 'artisan')->first()->id;
        return view('auth.auth', compact('clientType', 'artisanType'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // add email and username request bag for query
        $request->request->set('email', $request->usr_email);
        $request->request->set('username', $request->usr_email);

        //set login credential to set username function by
        $this->loginCredential = $request->usr_email;

        return $this->traitLogin($request);
    }

    /**
     * Get the login field to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return filter_var($this->loginCredential, FILTER_VALIDATE_EMAIL) ? 'email': 'username';
    }
}
