<?php

declare(strict_types=1);

return [

    /* -----------------------------------------------------------------
     |  Route settings
     | -----------------------------------------------------------------
     */

    'route' => [
        'enabled' => (bool) env(key: 'LOG_VIEWER_ENABLED', default: false),

        'attributes' => [
            'prefix' => env(key: 'LOG_VIEWER_PREFIX', default: 'log-viewer'),

            'middleware' => env(key: 'LOG_VIEWER_MIDDLEWARE')
                ? explode(separator: ',', string: env(key: 'LOG_VIEWER_MIDDLEWARE'))
                : null,
        ],
    ],

];
