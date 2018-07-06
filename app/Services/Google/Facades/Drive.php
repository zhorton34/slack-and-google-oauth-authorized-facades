<?php namespace App\Services\Google\Facades;

use Illuminate\Support\Facades\Facade;

class Drive extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'GoogleDrive';
    }
}
