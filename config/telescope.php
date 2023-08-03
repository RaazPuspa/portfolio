<?php

declare(strict_types=1);

use Laravel\Telescope\Http\Middleware\Authorize;
use Laravel\Telescope\Watchers;

return [

    /*
    |--------------------------------------------------------------------------
    | Telescope Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Telescope will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env(key: 'TELESCOPE_PATH', default: 'telescope'),

    /*
    |--------------------------------------------------------------------------
    | Telescope Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Telescope route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
        Authorize::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Allowed / Ignored Paths & Commands
    |--------------------------------------------------------------------------
    |
    | The following array lists the URI paths and Artisan commands that will
    | not be watched by Telescope. In addition to this list, some Laravel
    | commands, like migrations and queue commands, are always ignored.
    |
    */

    'only_paths' => [
    ],

    'ignore_paths' => [
    ],

    'ignore_commands' => [
    ],

    /*
    |--------------------------------------------------------------------------
    | Telescope Watchers
    |--------------------------------------------------------------------------
    |
    | The following array lists the "watchers" that will be registered with
    | Telescope. The watchers gather the application's profile data when
    | a request or task is executed. Feel free to customize this list.
    |
    */

    'watchers' => [
        Watchers\BatchWatcher::class => env(key: 'TELESCOPE_BATCH_WATCHER', default: true),

        Watchers\CacheWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_CACHE_WATCHER', default: true),
            'hidden' => [],
        ],

        Watchers\ClientRequestWatcher::class => env(key: 'TELESCOPE_CLIENT_REQUEST_WATCHER', default: true),

        Watchers\CommandWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_COMMAND_WATCHER', default: true),
            'ignore' => [],
        ],

        Watchers\DumpWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_DUMP_WATCHER', default: true),
            'always' => env(key: 'TELESCOPE_DUMP_WATCHER_ALWAYS', default: false),
        ],

        Watchers\EventWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_EVENT_WATCHER', default: true),
            'ignore' => [],
        ],

        Watchers\ExceptionWatcher::class => env(key: 'TELESCOPE_EXCEPTION_WATCHER', default: true),

        Watchers\GateWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_GATE_WATCHER', default: true),
            'ignore_abilities' => [],
            'ignore_packages' => true,
            'ignore_paths' => [],
        ],

        Watchers\JobWatcher::class => env(key: 'TELESCOPE_JOB_WATCHER', default: true),

        Watchers\LogWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_LOG_WATCHER', default: true),
            'level' => 'error',
        ],

        Watchers\MailWatcher::class => env(key: 'TELESCOPE_MAIL_WATCHER', default: true),

        Watchers\ModelWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_MODEL_WATCHER', default: true),
            'events' => ['eloquent.*'],
            'hydrations' => true,
        ],

        Watchers\NotificationWatcher::class => env(key: 'TELESCOPE_NOTIFICATION_WATCHER', default: true),

        Watchers\QueryWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_QUERY_WATCHER', default: true),
            'ignore_packages' => true,
            'ignore_paths' => [],
            'slow' => 100,
        ],

        Watchers\RedisWatcher::class => env(key: 'TELESCOPE_REDIS_WATCHER', default: true),

        Watchers\RequestWatcher::class => [
            'enabled' => env(key: 'TELESCOPE_REQUEST_WATCHER', default: true),
            'size_limit' => env(key: 'TELESCOPE_RESPONSE_SIZE_LIMIT', default: 64),
            'ignore_http_methods' => [],
            'ignore_status_codes' => [],
        ],

        Watchers\ScheduleWatcher::class => env(key: 'TELESCOPE_SCHEDULE_WATCHER', default: true),
        Watchers\ViewWatcher::class => env(key: 'TELESCOPE_VIEW_WATCHER', default: true),
    ],
];
