<?php namespace App\Services\Google;

use Sheets;
use Google_Service_Sheets_Spreadsheet as GoogleSpreadSheet;
use Google_Service_Sheets_SpreadsheetProperties as SpreadSheetProperties;

class SpreadSheet
{

    private $props;
    private $service;
    private $spreadsheet;

    public function __construct($token)
    {
        Sheets::setAccessToken($token);
        $this->service = Sheets::getService()->spreadsheets;
        $this->spreadsheet = new GoogleSpreadSheet();
        $this->props = new SpreadSheetProperties;
    }


    public function create($name)
    {
        $this->props->setTitle($name);
        $this->setProperties()->service->create($this->spreadsheet);
    }

    public function setProperties()
    {
        $this->spreadsheet->setProperties($this->props);
        return $this;
    }

}
