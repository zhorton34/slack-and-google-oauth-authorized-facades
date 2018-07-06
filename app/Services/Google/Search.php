<?php namespace App\Services\Google;

use Google_Service_Drive as GoogleDrive;


class Search
{

    private $drive;

    public function __construct($client)
    {

        $this->drive = new GoogleDrive($client);

    }

    public function folders()
    {
        $filter = ["q" => "trashed = false AND mimeType='application/vnd.google-apps.folder'"];

        return collect($this->drive->files->listFiles($filter));

    }

    public function documents()
    {

        $filter = ["q" => "trashed = false AND mimeType='application/vnd.google-apps.document'"];

        return collect($this->drive->files->listFiles($filter));
    }

    public function spreadsheets()
    {
        $filter = ['q' => "trashed = false AND mimeType='application/vnd.google-apps.spreadsheet'"];

        return collect($this->drive->files->listFiles($filter));
    }

    public function all()
    {
        return collect($this->drive->files->listFiles());
    }
}
