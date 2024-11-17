<?php

return [
    'corp_id' => env('WXWORK_CORP_ID', ''),
    'corp_secret' => env('WXWORK_CORP_SECRET', ''),
    
    'cache' => [
        'driver' => env('WXWORK_CACHE_DRIVER', 'file'),
        'path' => storage_path('wxwork/cache'),
        
        // Redis 配置
        'connection' => 'default',
        'prefix' => 'wxwork:',
    ],
];

