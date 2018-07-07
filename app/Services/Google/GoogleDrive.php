<?php namespace App\Services\Google;

use App\Services\Google\GoogleDriveManager;

class GoogleDrive extends GoogleDriveManager
{

    protected $script;
    protected $folder;
    protected $document;
    protected $spreadsheet;

    protected $move;
    protected $search;

    protected $resources = ['Script', 'Folder', 'Document', 'SpreadSheet'];
    protected $actions = ['Move', 'Search'];

}
