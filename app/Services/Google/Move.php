<?php namespace App\Services\Google;

use Google_Service_Drive_DriveFile as DriveResource;
use Google_Service_Drive as GoogleDrive;
use Google;

class Move
{
    private $drive;
    private $resource;

    public function __construct($client)
    {
        $this->drive = new GoogleDrive($client);
    }


    public function resource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    public function to($folder)
    {
        $emptyMeta = new DriveResource([]);

        $this->drive->files->update($this->resource->id, $emptyMeta, [
            'addParents' => $folder->id,
            'fields' => 'id, parents'
        ]);
    }
}
