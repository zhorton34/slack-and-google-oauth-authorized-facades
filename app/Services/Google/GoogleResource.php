<?php namespace App\Services\Google;

use Google;
use Google_Service_Drive as GoogleDrive;
use Google_Service_Drive_DriveFile as DriveResource;

class GoogleResource
{
    protected $meta;
    protected $type;
    protected $drive;
    protected $resource;

    public function __construct($client)
    {
        $this->drive = new GoogleDrive($client);
        $this->setType();
    }

    public function create($name)
    {
        $type = 'application/vnd.google-apps.' . $this->type;
        $options = ['name' => $name, 'mimeType' => $type];

        $this->meta = new DriveResource($options);

        $this->resource = new DriveResource($this->files()->create($this->meta, ['fields' => 'id']));

        return $this;
    }

    protected function files()
    {
        return $this->drive->files;
    }

    protected function setType()
    {
        $path = strtolower(get_class($this));

        $class = explode('\\', $path);
        $class = end($class);

        $this->type = $class;
        return $this;
    }


}
