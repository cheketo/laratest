<?php
/**
 * Created by PhpStorm.
 * User: mwege
 * Date: 2017/8/2
 * Time: 10:21.
 */

return [
    'informix' => [
        'driver'          => 'informix',
        'host'            => env('DB_IFX_HOST', '10.1.1.14'),
        'database'        => env('DB_IFX_DATABASE', 'siu_grado_cap2'),
        'username'        => env('DB_IFX_USERNAME', 'dba'),
        'password'        => env('DB_IFX_PASSWORD', 'dba'),
        'service'         => env('DB_IFX_SERVICE', '1523'),
        'server'          => env('DB_IFX_SERVER', 'ol_informix1170'),
        'db_locale'       => 'en_US.819',
        'client_locale'   => 'en_US.819',
        'db_encoding'     => 'GBK',
        'initSqls'        => false,
        'client_encoding' => 'UTF-8',
        'prefix'          => '',
    ],
];
