<?php namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class Slack extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Slack';
    }
}
