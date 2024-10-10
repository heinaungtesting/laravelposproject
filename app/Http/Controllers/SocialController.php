<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //redirect
    function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    //callback
    function callback($provider){
        $socialuser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
            'provider_id' => $socialuser->id,
        ], [
            'name' => $socialuser->name,
            'email' => $socialuser->email,
            'provider_token' => $socialuser->token,
            'provider'=>$provider,
            'role'=>'user'
        ]);

        Auth::login($user);

        return to_route('customerhome');
    }
}
