<?php
return array(
    'redis' => array(
        'common' => array(
            'host'  => '@appname@_redis',
            'port'  => 6379,
            'timeout'=> 1,
            'persistent' => 1,  //默认开启长连接
        )
    ),
);