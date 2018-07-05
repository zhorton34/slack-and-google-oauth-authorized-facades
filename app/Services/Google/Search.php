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

    public function spreadsheets()
    {

        return Sheets::spreadSheetList();

    }

    public function all()
    {

        return $this->drive->files->listFiles();

    }
}
