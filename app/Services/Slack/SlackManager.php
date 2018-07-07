<?php namespace App\Services\Slack;

use \GuzzleHttp\Client;

class SlackManager
{
    protected $code;
    protected $token;
    protected $client;
    protected $request = 'https://slack.com/api/oauth.access?';
    protected $response;

    public function __construct()
    {
        $this->setClient()->authorize();
    }


    protected function setClient()
    {
        $this->client = new Client;

        return $this;
    }

    protected function authorize()
    {
        if(!request()->has('code')) return $this->setAccessToken();

        $this->setAuthCode()
            ->buildAuthRequest()
            ->sendAuthRequest()
            ->saveAuthResponse()
            ->setAccessToken();
    }

    protected function setAccessToken()
    {
        $this->token = auth()->user()
                             ->service('slack')
                             ->getAccessToken();
        return $this;
    }

    protected function buildAuthRequest()
    {

        foreach(config('slack.credentials') as $key => $value)
        {
            $param = $key . '=' . $value . '&';
            $this->request .= $param;
        }

        $this->request .= "code={$_GET['code']}";

        return $this;
    }

    protected function sendAuthRequest()
    {
        $this->response = json_decode(
            $this->client
                ->request('GET', $this->request)
                ->getBody()
                ->getContents()
        );

        return $this;
    }

    protected function saveAuthResponse()
    {
        if(!$this->response->ok) return $this;

        $credentials['refresh_token'] = 'none';
        $credentials['access_token'] = $this->response->access_token;
        $credentials['expires_in'] = 3600;

        auth()->user()->addService('slack', $credentials);

        return $this;
    }

    protected function setAuthCode()
    {
        $this->code = $_GET['code'];

        return $this;
    }

    public function authorizeUser()
    {
        return $this;
    }


}
