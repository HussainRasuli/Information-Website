<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
        ],

        'slider' => [
            'driver' => 'local',
            'root' => storage_path('app/slider'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'about' => [
            'driver' => 'local',
            'root' => storage_path('app/about'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'activity_image' => [
            'driver' => 'local',
            'root' => storage_path('app/activity_image'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'activity_video' => [
            'driver' => 'local',
            'root' => storage_path('app/activity_video'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'teacher' => [
            'driver' => 'local',
            'root' => storage_path('app/teacher'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'galary' => [
            'driver' => 'local',
            'root' => storage_path('app/galary'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'CoverImage' => [
            'driver' => 'local',
            'root' => storage_path('app/CoverImage'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        'users' => [
            'driver' => 'local',
            'root' => storage_path('app/users'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
