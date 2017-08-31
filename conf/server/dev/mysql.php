<?php
return array(
    '@appname@' => array(
        'master' => array(
            'username'  => '@db_root_name@',
            'password'  => '@db_root_pwd@',
            'host'      => '@appname@_mysql',
            'port'      => '3306',
            'dbname'    => '@appname@',
            'pconnect'  => false,
            'charset'   => 'utf8',
            'timeout'   => 3,
        ),
        'slave' => array(
            'username'  => '@db_root_name@',
            'password'  => '@db_root_pwd@',
            'host'      => '@appname@_mysql',
            'port'      => '3306',
            'dbname'    => '@appname@',
            'pconnect'  => false,
            'charset'   => 'utf8',
            'timeout'   => 3,
        ),
        'backup' => array(
            'username'  => '@db_root_name@',
            'password'  => '@db_root_pwd@',
            'host'      => '@appname@_mysql',
            'port'      => '3306',
            'dbname'    => '@appname@',
            'pconnect'  => false,
            'charset'   => 'utf8',
            'timeout'   => 3,
        )
    )
);
