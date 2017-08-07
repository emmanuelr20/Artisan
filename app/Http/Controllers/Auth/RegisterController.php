<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\AccountType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|max:255|unique:users',
            // 'acc_type' => 'required|integer|max:2',
            'agree' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'account_type_id' => $data['acc_type'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $clientType = AccountType::where('name', 'client')->first()->id;
        $artisanType = AccountType::where('name', 'artisan')->first()->id;
        return view('auth.auth', compact('clientType', 'artisanType'));
    }

    /**
     * ajax form validation for mail.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkMail(Request $request)
    {
        $this->validate($request, ['email' => 'required|string|email|max:255|unique:users']);
        return response()->json(
            ['message' => 'email is avialable'], 200
            );
    }

     /**
     * ajax form validation for username.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkUsername(Request $request)
    {
        $this->validate($request, ['username' => 'required|string|max:255|unique:users',]);
        return response()->json(
            ['message' => 'username is avialable'], 200
            );
    }

    /**
     * fetch account type name.
     *
     * @param  integer  $id
     * @return string
     */
    protected function getAccountType($id)
    {
        $accountType = AccountType::where('id', $id)->first();
        $accountType ? $accountType = strtolower($accountType) : $accountType = 'client';
        return $accountType;
    }

    /**
     * assign account model of given type.
     *
     * @param  integer  $id
     * @return string
     */
    protected function registered(Request $request, $user)
    {
        if ($this->getAccountType($user->account_type_id) == 'artisan') {
            # code...
        } else {
            # code...
        }
        
    }
}