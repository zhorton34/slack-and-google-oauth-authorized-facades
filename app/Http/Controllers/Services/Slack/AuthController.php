<?php

namespace App\Http\Controllers\Services\Slack;


use App\Http\Controllers\Controller;
use Socialite;
use Slack;

class AuthController extends Controller
{
    public function toSlack()
    {
        return Socialite::driver('slack')
                        ->with(config('slack.credentials'))
                        ->scopes(config('slack.scopes'))
                        ->redirect();

    }
    public function fromSlack()
    {
        Slack::authorizeUser();

        return redirect('/auth/slack/channels');
    }
}
