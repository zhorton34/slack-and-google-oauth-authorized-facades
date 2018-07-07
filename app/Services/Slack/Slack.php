<?php namespace App\Services\Slack;

class Slack extends SlackManager
{

    public function channels()
    {
        return new Channel($this->client, $this->token);
    }
}
