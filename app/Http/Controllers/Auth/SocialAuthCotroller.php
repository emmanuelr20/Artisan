<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Socialite;

class SocialAuthCotroller extends Controller
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
    		Socialite::driver($provider)->user()
    		);
    	Auth::login($user);

    	return redirect('/market');
    }

    public function fetchUser($user)
    {
    	$user = User::firstOrNew(['email' => $user->email]);
    	if ($user->exists()){
    		return $user;
    	} else {
    		$user = User::create([
    			'name' => $user->first_name . ' ' . $user->last_name,,
    			'email' => $user->email,
    			'account_type_id' => 1, //counld be taken out depending on c=final conclusion
    			]);
    		\Session::flash('success', 'Welcome!');
    		return $user;
    	}
    }
}
