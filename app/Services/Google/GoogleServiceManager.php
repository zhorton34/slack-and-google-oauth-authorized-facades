<?php namespace App\Services\Google;

use Google;
use App\Services\Google\Move;
use App\Services\Google\Script;
use App\Services\Google\Search;
use App\Services\Google\Folder;
use App\Services\Google\SpreadSheet;
use Google_Service_Drive as GoogleDrive;

class GoogleServiceManager
{
    public function __construct()
    {
        $this->setClient()
            ->register('actions')
            ->register('resources');
    }

    public function __call($property, $args)
    {
        if(!property_exists($this, $property)) return "Property Doesn't Exists";

        return $this->$property;

    }

    protected function setClient()
    {
        $this->client = Google::getClient();
        $token = auth()->user()->service('google')->token();

        $this->client->setAccessToken($token);

        return $this;
    }


    protected function register($array)
    {
        if(!isset($this->$array)) return $this;

        foreach($this->$array as $className)
        {
            $prop = strtolower($className);
            $class = $this->path($className);

            $this->$prop = new $class($this->client);
        }

        return $this;
    }

    protected function path($class)
    {
        $path = explode('\\', __CLASS__);
        array_pop($path);

        return implode('\\', $path) . '\\' . $class;
    }
}
