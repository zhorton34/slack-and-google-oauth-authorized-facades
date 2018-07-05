<?php

namespace App\Services\Google;

use Sheets;
use Google_Service_Sheets_Spreadsheet as GoogleSpreadSheet;
use Google_Service_Sheets_SpreadsheetProperties as SpreadSheetProperties;

class SpreadSheet
{

    private $list;
    private $props;
    private $service;
    private $spreadsheet;

    public function __construct()
    {
        $this->service = Sheets::getService()->spreadsheets;
        $this->spreadsheet = new GoogleSpreadSheet();
        $this->props = new SpreadSheetProperties;
    }


    public function make()
    {
        $this->service->create($this->spreadsheet);
    }

    public function setTitle($title)
    {
        $this->props->setTitle($title);
        $this->setProps();
        return $this;
    }

    public function setProps()
    {
        $this->spreadsheet->setProperties($this->props);
        return $this->spreadsheet;
    }

}
