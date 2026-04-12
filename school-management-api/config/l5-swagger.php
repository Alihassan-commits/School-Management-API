<?php

return [

    'default' => 'default',

    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'School API',
            ],

            'routes' => [
                'api' => 'api/documentation',
            ],

            'paths' => [

                'use_absolute_path' => true,

                'swagger_ui_assets_path' => env(
                    'L5_SWAGGER_UI_ASSETS_PATH',
                    'vendor/swagger-api/swagger-ui/dist/'
                ),

                'docs_json' => 'api-docs.json',
                'docs_yaml' => 'api-docs.yaml',

                'format_to_use_for_docs' => 'json',

                // ✅ IMPORTANT FIX (THIS IS WHAT WAS BREAKING YOUR PROJECT)
                'annotations' => [
                    base_path('app'),
                    base_path('routes'),
                ],
            ],
        ],
    ],

    'defaults' => [

        'routes' => [
            'docs' => 'docs',
            'oauth2_callback' => 'api/oauth2-callback',

            'middleware' => [
                'api' => [],
                'asset' => [],
                'docs' => [],
                'oauth2_callback' => [],
            ],

            'group_options' => [],
        ],

        'paths' => [

            'docs' => storage_path('api-docs'),

            'views' => base_path('resources/views/vendor/l5-swagger'),

            'base' => env('L5_SWAGGER_BASE_PATH', null),

            'excludes' => [],
        ],

        // ❌ KEEP SIMPLE (avoid old config confusion)
        'scanOptions' => [
            'exclude' => [],
            'open_api_spec_version' =>
                \L5Swagger\Generator::OPEN_API_DEFAULT_SPEC_VERSION,
        ],

        'securityDefinitions' => [

            'securitySchemes' => [

                // ✅ SANCTUM TOKEN SUPPORT (IMPORTANT FOR API TESTING)
                'bearerAuth' => [
                    'type' => 'http',
                    'scheme' => 'bearer',
                    'bearerFormat' => 'JWT',
                ],

            ],

            'security' => [],
        ],

        // ⚡ IMPORTANT FOR TESTING
        'generate_always' => true,

        'generate_yaml_copy' => false,

        'proxy' => false,

        'additional_config_url' => null,

        'operations_sort' => null,

        'validator_url' => null,

        'ui' => [

            'display' => [
                'dark_mode' => false,
                'doc_expansion' => 'none',
                'filter' => true,
            ],

            'authorization' => [
                'persist_authorization' => false,

                'oauth2' => [
                    'use_pkce_with_authorization_code_grant' => false,
                ],
            ],
        ],

        'constants' => [
            'L5_SWAGGER_CONST_HOST' => 'http://127.0.0.1:8000',
        ],
    ],
];
