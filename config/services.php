<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    //drive thru credentials
    'facebook' => [
        'client_id' => '448346699986643',
        'client_secret' => '107af12d8db00540956113e7b8149236',
        'redirect' => 'http://localhost:8000/signin/fb/callback',
    ],

    // //drivethru-test app
    // 'facebook' => [
    //     'client_id' => '387357693136896',
    //     'client_secret' => '628bb75814964cbdb188b572c8ec0f12',
    //     'redirect' => 'http://localhost:8000/signin/fb/callback',
    // ],

];