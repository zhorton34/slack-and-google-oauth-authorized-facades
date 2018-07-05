<?php

namespace App\Services\Google;

use Google_Service_Drive_DriveFile as DriveResource;
use Google_Service_Drive as GoogleDrive;
use Google;

class Directory
{
    private $meta;
    private $service;
    private $directory;

    public function __construct($client)
    {
        $this->service = new GoogleDrive($client);
    }

    public function directory($name)
    {
        $options = ['name' => $name, 'mimeType' => 'application/vnd.google-apps.folder'];
        $this->meta = new DriveResource($options);

        return $this;
    }

    public function create()
    {
        $this->directory = new DriveResource($this->service->files->create($this->meta, ['fields' => 'id']));
        return $this;
    }

    public function get()
    {
        return $this->directory;
    }
}
