<?php namespace App\Services\Google;

use Sheets;
use Google;
use App\Services\Google\Search;
use App\Services\Google\Folder;
use App\Services\Google\SpreadSheet;
use Google_Service_Drive as GoogleDrive;


class Drive
{

    private $spreadsheet;
    private $folder;
    private $document;

    public function __construct()
    {

        $token = auth()->user()->service('google')->token();

        $client = Google::getClient();
        $client->setAccessToken($token);

        $this->folder = new Folder($client);
        $this->document = new Document($client);
        $this->spreadsheet = new SpreadSheet($token);

        $this->search = new Search(new GoogleDrive($client));

    }

    public function folder()
    {

        return $this->folder;

    }

    public function document()
    {

        return $this->document;

    }

    public function spreadsheet()
    {

        return $this->spreadsheet;

    }


    public function search()
    {

        return $this->search;

    }

}
