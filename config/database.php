<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env(key: 'DB_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env(key: 'DATABASE_URL'),
            'database' => env(key: 'DB_DATABASE', default: database_path(path: 'database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env(key: 'DB_FOREIGN_KEYS', default: true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env(key: 'DATABASE_URL'),
            'host' => env(key: 'DB_HOST'),
            'port' => env(key: 'DB_PORT'),
            'database' => env(key: 'DB_DATABASE'),
            'username' => env(key: 'DB_USERNAME'),
            'password' => env(key: 'DB_PASSWORD'),
            'unix_socket' => env(key: 'DB_SOCKET', default: ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded(extension: 'pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env(key: 'MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env(key: 'DATABASE_URL'),
            'host' => env(key: 'DB_HOST'),
            'port' => env(key: 'DB_PORT'),
            'database' => env(key: 'DB_DATABASE'),
            'username' => env(key: 'DB_USERNAME'),
            'password' => env(key: 'DB_PASSWORD'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env(key: 'DATABASE_URL'),
            'host' => env(key: 'DB_HOST'),
            'port' => env(key: 'DB_PORT'),
            'database' => env(key: 'DB_DATABASE'),
            'username' => env(key: 'DB_USERNAME'),
            'password' => env(key: 'DB_PASSWORD'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'encrypt' => env(key: 'DB_ENCRYPT', default: 'yes'),
            'trust_server_certificate' => env(key: 'DB_TRUST_SERVER_CERTIFICATE', default: 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => '_migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env(key: 'REDIS_CLIENT'),

        'options' => [
            'cluster' => env(key: 'REDIS_CLUSTER'),
            'prefix' => env(key: 'REDIS_PREFIX'),
        ],

        'default' => [
            'url' => env(key: 'REDIS_URL'),
            'host' => env(key: 'REDIS_HOST'),
            'username' => env(key: 'REDIS_USERNAME'),
            'password' => env(key: 'REDIS_PASSWORD'),
            'port' => env(key: 'REDIS_PORT'),
            'database' => env(key: 'REDIS_DB'),
        ],

        'cache' => [
            'url' => env(key: 'REDIS_URL'),
            'host' => env(key: 'REDIS_HOST'),
            'username' => env(key: 'REDIS_USERNAME'),
            'password' => env(key: 'REDIS_PASSWORD'),
            'port' => env(key: 'REDIS_PORT'),
            'database' => env(key: 'REDIS_CACHE_DB'),
        ],

    ],

];
