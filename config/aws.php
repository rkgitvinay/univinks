<?php

use Aws\Laravel\AwsServiceProvider;

return [

    'credentials' => [
        'key'    => 'AKIAIYLT7HLPDOHPR5QQ',
        'secret' => '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',
    ],
    'region' => env('AWS_REGION', 'us-east-1'),
    'version' => 'latest',
    'ua_append' => [
        'L5MOD/' . AwsServiceProvider::VERSION,
    ],
];
