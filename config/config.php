<?php

return [
    'default_status' => env('MISMAR_DEFAULT_STATUS', 'pending'),
    'token' => [
        'live_token' => env('MISMAR_LIVE_TOKEN', 'your_live_token_here'),
        'staging_token' => env('MISMAR_STAGING_TOKEN', 'your_staging_token_here'),
    ],
];
