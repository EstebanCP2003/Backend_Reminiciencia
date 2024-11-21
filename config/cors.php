<?php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie' ], // Permitir rutas de la API
    'allowed_methods' => ['*'], // Permitir todos los métodos HTTP
    'allowed_origins' => ['http://localhost:8100'], // Permitir el origen del frontend
    'allowed_headers' => ['*'], // Permitir todos los encabezados
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
