<?php namespace App\Services\Google;

use Google;
use Google_Service_Drive as GoogleDrive;


class GoogleAction
{
    protected $drive;

    public function __construct($client)
    {

        $this->drive = new GoogleDrive($client);

    }
}
