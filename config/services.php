<?php

return [

    /*
    |--------------------------------------------------------------------------
    | サードパーティーサービス
    |--------------------------------------------------------------------------
    |
    | このファイルは、Stripe、Mailgun、Mandrillなどのサードパーティーサービスの
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | 様々な認証情報をパッケージから簡単に見つけられるように、この主のタイプの
    | 情報をまとめておくデフォルトの場所を用意するのは、筋が通っているでしょう。
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    //Socialite
    'facebook' => [
            'client_id'     => env('FB_CLIENT_ID'),
            'client_secret' => env('FB_CLIENT_SECRET'),
            'redirect'      => env('FB_URL'),
    ],
    'twitter' => [
            'client_id'     => env('TWITTER_CLIENT_ID'),
            'client_secret' => env('TWITTER_CLIENT_SECRET'),
            'redirect'      => env('TWITTER_URL'),
    ],
    'google' => [
            'client_id'     => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect'      => env('GOOGLE_URL'),
    ],
    'github' => [
            'client_id'     => env('GITHUB_CLIENT_ID'),
            'client_secret' => env('GITHUB_CLIENT_SECRET'),
            'redirect'      => env('GITHUB_URL'),
    ],
    'bitbucket' => [
            'client_id'     => env('BITBUCKET_CLIENT_ID'),
            'client_secret' => env('BITBUCKET_CLIENT_SECRET'),
            'redirect'      => env('BITBUCKET_URL'),
    ],
];
