<?php

return [
    // 'serverKey' => env('MIDTRANS_SERVER_KEY', null),
    // 'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    // 'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    // 'is3ds' => env('MIDTRANS_IS_3DS', true)

    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'merchantId' => env('MIDTRANS_MERCHANT_ID'),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', true),
    'is3ds' => env('MIDTRANS_IS_3DS', true),
];
