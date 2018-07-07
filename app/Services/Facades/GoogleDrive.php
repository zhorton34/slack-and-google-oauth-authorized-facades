<?php namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleDrive extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'GoogleDrive';
    }
}
