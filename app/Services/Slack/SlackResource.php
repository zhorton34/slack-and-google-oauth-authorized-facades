<?php namespace App\Services\Slack;

class SlackResource
{
    protected $token;
    protected $client;
    protected $action;
    protected $request;
    protected $options;
    protected $response;
    protected $resource;
    protected $resources = ['channels'];
    protected $endpoint = 'https://slack.com/api/';


    public function __construct($client, $token)
    {
        $this->token = $token;
        $this->client = $client;
    }

    public function __call($action, $options)
    {
        if(!in_array($action, $this->actions)) return;

        $this->setResource()
             ->setAction($action)
             ->setOptions($options)
             ->buildRequest()
             ->send();

        return $this->collectResponse();

    }

    protected function collectResponse()
    {
        $response = json_decode(
            $this->response
                 ->getBody()
                 ->getContents()
        );

        if(isset($response->{$this->resource}))
            return collect($response->{$this->resource});

    }

    protected function send()
    {

        $this->response = $this->client->request('GET', $this->request);

    }

    protected function setOptions($options)
    {
        if(empty($options)) return $this->setEmptyOptions();

        $this->options = array_merge($options[0], ['token' => $this->token]);

        return $this;
    }

    protected function setEmptyOptions()
    {
        $this->options = ['token' => $this->token];

        return $this;
    }
    protected function buildRequest()
    {
        $this->request = "{$this->endpoint}{$this->resource}.{$this->action}" . $this->buildQuery();

        return $this;
    }

    protected function buildQuery()
    {
        $query = '?';

        foreach($this->options as $key => $prop)
        {
            $query .= $key . '=' . $prop . '&';
        }

        return rtrim($query, '&');
    }

    protected function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    protected function setResource()
    {
        $path = strtolower(get_class($this));
        $class = explode('\\', $path);
        $class = end($class);

        $resource = $class . 's';

        if(in_array($resource, $this->resources))
            $this->resource = $resource;

        return $this;
    }


}
