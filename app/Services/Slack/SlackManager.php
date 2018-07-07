<?php

namespace App\Services\Slack;


class SlackManager
{

    public function __construct()
    {
        $this->setClient()
            ->register('actions')
            ->register('resources');
    }

    protected function setClient()
    {
        $this->client = Google::getClient();
        $token = auth()->user()->service('google')->token();

        $this->client->setAccessToken($token);

        return $this;
    }
}
