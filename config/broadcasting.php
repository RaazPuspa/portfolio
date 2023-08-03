<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "ably", "redis", "log", "null"
    |
    */

    'default' => env(key: 'BROADCAST_DRIVER', default: 'log'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env(key: 'PUSHER_APP_KEY'),
            'secret' => env(key: 'PUSHER_APP_SECRET'),
            'app_id' => env(key: 'PUSHER_APP_ID'),
            'options' => [
                'cluster' => env(key: 'PUSHER_APP_CLUSTER'),
                'host' => env(key: 'PUSHER_HOST'),
                'port' => env(key: 'PUSHER_PORT', default: 443),
                'scheme' => env(key: 'PUSHER_SCHEME', default: 'https'),
                'encrypted' => true,
                'useTLS' => str(string: env(key: 'PUSHER_SCHEME', default: 'https'))->is(pattern: 'https'),
            ],
            'client_options' => [
            ],
        ],

        'ably' => [
            'driver' => 'ably',
            'key' => env(key: 'ABLY_KEY'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
