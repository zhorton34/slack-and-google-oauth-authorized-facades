<?php
/**
 * Created by PhpStorm.
 * User: zhort
 * Date: 7/4/18
 * Time: 10:28 PM
 */

namespace App\Services\Google;

use Sheets;

class Drive
{
    public function __construct()
    {
        $token = auth()->user()->service('google')->token();
        Sheets::setAccessToken($token);
    }

    public function spreadSheetList()
    {
        return Sheets::spreadSheetList();
    }

}
