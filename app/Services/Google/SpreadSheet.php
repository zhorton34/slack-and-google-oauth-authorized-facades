<?php namespace App\Services\Google;

use Google_Service_Drive_DriveFile as DriveResource;
use Google_Service_Drive as GoogleDrive;
use Google;

class SpreadSheet
{
    private $meta;
    private $drive;
    private $spreadsheet;

    public function __construct($client)
    {
        $this->drive = new GoogleDrive($client);
    }

    public function create($name)
    {
        $options = ['name' => $name, 'mimeType' => 'application/vnd.google-apps.spreadsheet'];
        $this->meta = new DriveResource($options);

        $this->spreadsheet = new DriveResource($this->drive->files->create($this->meta, ['fields' => 'id']));
        return $this;
    }

    public function get()
    {
        return $this->spreadsheet;
    }
}
