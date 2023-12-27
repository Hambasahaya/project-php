<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class OAuth2 extends BaseConfig
{
    public $providers = [
        'google' => [
            'clientID'     => 'your-client-id',
            'clientSecret' => 'your-client-secret',
            'redirectUri'  => 'your-redirect-uri',
            'scopes'       => ['email', 'profile'],
        ],
    ];
}
