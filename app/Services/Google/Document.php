<?php namespace App\Services\Google;

use Google_Service_Drive_DriveFile as DriveResource;
use Google_Service_Drive as GoogleDrive;
use Google;

class Document
{
    private $meta;
    private $drive;
    private $document;

    public function __construct($client)
    {
        $this->drive = new GoogleDrive($client);
    }

    public function create($name)
    {
        $options = ['name' => $name, 'mimeType' => 'application/vnd.google-apps.document'];
        $this->meta = new DriveResource($options);

        $this->document = new DriveResource($this->drive->files->create($this->meta, ['fields' => 'id']));
        return $this;
    }


    public function get()
    {
        return $this->document;
    }
}
