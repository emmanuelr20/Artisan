<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Socialite;

class SocialAuthController extends Controller
{
    function __construct()
	{
		$this->middleware('guest');
	}

    public function send(Request $request, $provider)
    {
    	return Socialite::with($provider)->redirect();
    }

    public function recieve(Request $request, $provider)
    {
		$user = $this->fetchUser(
    		Socialite::driver($provider)->stateless()->user(), $provider
    		);
        // dd($user);
    	\Auth::login($user);

    	return redirect('/home');
    }

    public function fetchUser($user, $provider)
    {
        // dd($user->id);
    	// $user = User::where(['provider' => $provider, 'provider_id' => $user->id]);
    	if (User::where(['provider' => $provider, 'provider_id' => $user->id])->orWhere('email', $user->email)->exists()){
    		return User::where(['provider' => $provider, 'provider_id' => $user->id])->first();
    	} else {
    		$user = User::create([
    			'name' => $user->name,
    			'email' => $user->email,
                'username' => 'user' . str_random(2) . uniqid(),
    			'account_type_id' => 1, //counld be taken out depending on c=final conclusion
                'provider' => $provider, 
                'provider_id', $user->id
    			]);
    		return $user;
    	}
    }
}
