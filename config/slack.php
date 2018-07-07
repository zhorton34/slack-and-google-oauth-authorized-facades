<?php

return [

    'scopes' => ['admin', 'channels:write', 'identify', 'channels:read'],

    'client_id'       => env('SLACK_CLIENT_ID', ''),
    'client_secret'   => env('SLACK_CLIENT_SECRET', ''),
    'redirect_uri'    => env('SLACK_REDIRECT', ''),
    'application_name' => env('SLACK_APPLICATION_NAME', ''),


    'credentials' => [
        'client_id'       => env('SLACK_CLIENT_ID', ''),
        'client_secret'   => env('SLACK_CLIENT_SECRET', ''),
        'redirect_uri'    => env('SLACK_REDIRECT', ''),
    ],

];
