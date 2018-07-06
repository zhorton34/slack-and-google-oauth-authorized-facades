<?php namespace App\Services\Google;

class Search extends GoogleAction
{

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
