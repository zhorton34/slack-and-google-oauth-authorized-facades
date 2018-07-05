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

    private $googleDrive;
    private $spreadSheet;
    private $builder;

    public function __construct()
    {

        $token = auth()->user()->service('google')->token();
        Sheets::setAccessToken($token);

        $client = Google::getClient();
        $client->setAccessToken($token);

        $this->builder = new Directory($client);
        $this->spreadSheet = new SpreadSheet();
        $this->googleDrive = new GoogleDrive($client);

        $this->search = new Search($this->googleDrive);

    }

    public function build()
    {

        return $this->builder;

    }

    public function search()
    {

        return $this->search;

    }

    public function spreadSheet()
    {
        return $this->spreadSheet;
    }

}
