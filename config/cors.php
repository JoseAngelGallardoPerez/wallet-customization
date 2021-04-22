<?php

return [
    'headers' => env('VELMIE_WALLET_CUSTOMIZATION_CORS_HEADERS', 'Content-Type,Authorization,X-Requested-With'),
    'methods' => env('VELMIE_WALLET_CUSTOMIZATION_CORS_METHODS', 'POST,GET,OPTIONS,PUT,DELETE'),
    'origin' => env('VELMIE_WALLET_CUSTOMIZATION_CORS_ORIGIN', '*'),
    'credentials' => env('VELMIE_WALLET_CUSTOMIZATION_CORS_CREDENTIALS', 'true'),
];