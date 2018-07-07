<?php

namespace App\Http\Controllers\Services\Slack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;


class AuthController extends Controller
{
    public function toSlack()
    {
        return Socialite::driver('slack')
                        ->scopes(['admin', 'channels:write'])
                        ->redirect();
    }
    public function fromSlack(Request $request)
    {
        $slackAccount = Socialite::driver('slack');
        dd($slackAccount->user());

        $code = $request->input('code');

        dd($request->input('code'));
        $user = $request->user();

        $credentials['access_token'] = $slackAccount ->token;
        $credentials['expires_in'] = $slackAccount->expiresIn;
        $credentials['refresh_token'] = $slackAccount ->refreshToken;

        $user->addService('slack', $credentials);

        return redirect('/auth/slack/channels');
    }
}
