<?php namespace App\Services\Google;

use Google_Service_Drive_DriveFile as DriveResource;


class Move extends GoogleAction
{

    private $resource;

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
