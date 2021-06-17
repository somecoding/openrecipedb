<?php
return [];
return [
    'api-tools-oauth2' => [

        'storage' => 'oauth2.doctrineadapter.default', // service name for the OAuth2 storage adapter

        /**
         * These special OAuth2Server options are parsed outside the options array
         */
        'allow_implicit'  => false, // default (set to true when you need to support browser-based or mobile apps)
        'access_lifetime' => 3600, // default (set a value in seconds for access tokens lifetime)
        'enforce_state'   => true,  // default

        /**
         * These are all OAuth2Server options with their default values
         */
        'options' => [
            'use_jwt_access_tokens'             => false,
            'store_encrypted_token_string'      => true,
            'use_openid_connect'                => false,
            'id_lifetime'                       => 3600,
            'www_realm'                         => 'Service',
            'token_param_name'                  => 'access_token',
            'token_bearer_header_name'          => 'Bearer',
            'require_exact_redirect_uri'        => true,
            'allow_credentials_in_request_body' => true,
            'allow_public_clients'              => true,
            'always_issue_new_refresh_token'    => false,
            'unset_refresh_token_after_use'     => true,
        ],
    ],
];
