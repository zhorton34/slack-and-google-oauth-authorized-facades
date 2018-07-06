<?php namespace App\Services\Google;

use Google;
use App\Services\Google\Move as Move;
use Google_Service_Drive as GoogleDrive;
use App\Services\Google\Search as Search;
use App\Services\Google\Folder as Folder;
use App\Services\Google\SpreadSheet as SpreadSheet;


class Drive
{

    protected $client;

    protected $move;
    protected $search;

    protected $folder;
    protected $document;
    protected $spreadsheet;

    protected $resources = [
        'spreadsheet' => 'SpreadSheet', 'document' => 'Document', 'folder' => 'Folder',
    ];

    protected $actions = [
        'search' => 'Search', 'move' => 'Move',
    ];

    public function __construct()
    {
        $this->setClient()
             ->register('actions')
             ->register('resources');

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

    public function move()
    {

        return $this->move;

    }

    protected function setClient()
    {
        $this->client = Google::getClient();
        $token = auth()->user()->service('google')->token();

        $this->client->setAccessToken($token);

        return $this;
    }


    public function register($array)
    {
        $path = 'App\Services\Google\\';

        foreach($this->$array as $prop => $className)
        {
            $class = $path . $className;
            $this->$prop = new $class($this->client);
        }

        return $this;
    }
}
