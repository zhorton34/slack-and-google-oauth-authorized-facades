<?php

namespace App\Http\Controllers\Services\Google;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Sheets;
use Google;

class AuthController extends Controller
{
    public function toGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function fromGoogle(Request $request)
    {
        $googleAccount = Socialite::driver('google')->user();
        $user = $request->user();

        $credentials['access_token'] = $googleAccount->token;
        $credentials['expires_in'] = $googleAccount->expiresIn;
        $credentials['refresh_token'] = $googleAccount->refreshToken;

        $user->addService('google', $credentials);

        return redirect('/home');
    }
}
