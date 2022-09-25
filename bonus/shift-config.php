<?php

return [

    'executable' => env('SHIFT_SCRIPT_PATH', '/opt/shift/main.php'),

    'build_executable' => env('BUILD_SCRIPT_PATH', '/opt/shift/build.php'),

    'webhook_executable' => env('WEBHOOK_SCRIPT_PATH', '/opt/shift/webhook.php'),

    'support_email_address' => env('SHIFT_SUPPORT_EMAIL_ADDRESS'),

    'latest_sku' => env('SHIFT_LATEST_SKU'),

    'free_skus' => ['LL', 'CN', 'NM', 'PU6', 'PU8', 'PU9'],

    'upgrade_plan_skus' => ['56', '57', '58', '60', '70', 'LL', 'LF', 'UC', 'CN', 'DU', 'P4', 'P2', 'T54', 'TG'],

    'ci_plan_skus' => ['LL', 'LF', 'DU', 'P2', '70'],

    'reviewable_skus' => ['70', 'LF', 'TG', 'T54', 'TWC'],
];
