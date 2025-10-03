<?php

return [
    'host' => env('POSTHOG_HOST', 'https://app.posthog.com'),
    'key' => env('POSTHOG_KEY', ''),
    'enabled' => env('POSTHOG_ENABLED', true),
];
