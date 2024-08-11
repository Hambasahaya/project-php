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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'nocaptcha' => [
        'secret' => env('6LfqlPopAAAAAHyXyFTMYhX1X2Jyd3Ep2gG35Mci'),
        'sitekey' => env('6LfqlPopAAAAACksFOUZ5g7E_0vokhagB9SYaCJa'),
        'options' => [
            'version' => 'v2',
            'type' => 'invisible', // Sesuaikan dengan jenis reCAPTCHA yang Anda daftarkan
        ],
    ],

];
