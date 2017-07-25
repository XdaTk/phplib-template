<?php
return array(
    'cache' => array(
        'redis' => array(
            'common' => array(
                'host'  => 'redis',
                'port'  => 6379,
                'timeout'=> 1,
                'persistent' => 1,  //默认开启长连接
            )
        ),
    ),

    'mysql' => array(
        '@appname@' => array(
            'master' => array(
                'username'  => '@db_root_name@',
                'password'  => '@db_root_pwd@',
                'host'      => 'mysql',
                'port'      => '3306',
                'dbname'    => '@appname@',
                'pconnect'  => false,
                'charset'   => 'utf8',
                'timeout'   => 3,
            ),
            'slave' => array(
                'username'  => '@db_root_name@',
                'password'  => '@db_root_pwd@',
                'host'      => 'mysql',
                'port'      => '3306',
                'dbname'    => '@appname@',
                'pconnect'  => false,
                'charset'   => 'utf8',
                'timeout'   => 3,
            ),
            'backup' => array(
                'username'  => '@db_root_name@',
                'password'  => '@db_root_pwd@',
                'host'      => 'mysql',
                'port'      => '3306',
                'dbname'    => '@appname@',
                'pconnect'  => false,
                'charset'   => 'utf8',
                'timeout'   => 3,
            )
        )
    ),

    'redis' => array(
        'common' => array(
            'host'  => 'redis',
            'port'  => 6379,
            'timeout'=> 1,
            'persistent' => 1,
            //'db'    => 1,
        ),
    ),

    'sms' => array(
        'default' => array(
            'service'       =>  'guodu',
            'username'      =>  '',  //根据实际情况填写
            'password'      =>  '',  //根据实际情况填写
            'type'          =>  '',  //根据实际情况填写
            'url'           =>  '',  //根据实际情况填写
        ),
    ),

    // @service 存储服务提供方的配置
    'filesystem' => array(

        /**
         * azure
         */
        'azure' => array(
            'name' => 'DEMO_ID',
            'key' => 'DEMO_KEY',
            'hostname' => 'blob.core.chinacloudapi.cn',
        ),

        /**
         * 阿里云存储格式
         */
        'oss' => array(
            'access_id' => 'DEMO_ACCESS_ID',
            'access_key' => 'DEMO_ACCESS_KEY',
            'hostname' => 'oss-cn-beijing.aliyuncs.com',
        ),

        /**
         * 本地存储格式
         * @path 存储路径 请确保目录的权限为777
         */
        'local' => array(
            'path'      => '/tmp'
        ),

        /*
         * 放置文件的空间名称列表
         * 空间命名规范 建议使用 private-appname-suffix 的形式  suffix可任意
         */
        'space' => array(
            'private-company-demo',
        )
    ),

    // 微信服务配置
    'wechat' => array(
        'demo' => array(
            'appid'            => '',
            'appsecret'        => '',
            'token'            => '',
            'encoding_aes_key' => '',

            // 微信支付使用
            'mch_id'           => '',
            'pay_key'          => '',
        ),
    ),
);