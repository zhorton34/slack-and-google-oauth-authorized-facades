<?php

namespace App\Services\Google;

use Sheets;
use Google;
use App\Services\Google\Search;
use App\Services\Google\Directory;
use App\Services\Google\SpreadSheet;
use Google_Service_Drive as GoogleDrive;


class Drive
{

    private $spreadsheet;
    private $directory;
    private $document;

    public function __construct()
    {

        $token = auth()->user()->service('google')->token();

        $client = Google::getClient();
        $client->setAccessToken($token);

        $this->document = new Document($client);
        $this->directory = new Directory($client);
        $this->spreadsheet = new SpreadSheet($token);

        $this->search = new Search(new GoogleDrive($client));

    }

    public function directory()
    {

        return $this->directory;

    }

    public function document()
    {
        return $this->directory();
    }

    public function search()
    {

        return $this->search;

    }

    public function spreadsheet()
    {
        return $this->spreadsheet;
    }

}
