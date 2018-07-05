<?php
/**
 * Created by PhpStorm.
 * User: zhort
 * Date: 7/5/18
 * Time: 4:24 AM
 */

namespace App\Services\Google;

use Sheets;

class Search
{

    private $drive;

    public function __construct($drive)
    {

        $this->drive = $drive;

    }

    public function folders()
    {
        $filter = ['q' => "trashed = false AND mimeType='application/vnd.google-apps.folder'"];

        return collect($this->drive->files->listFiles($filter));

    }
    public function spreadsheets()
    {

        return collect(Sheets::spreadSheetList());

    }

    public function all()
    {

        return collect($this->drive->files->listFiles());

    }
}
