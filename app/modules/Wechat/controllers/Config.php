<?php

/**
 * 此脚本用于为微信服务号更新基本配置，包括：
 *
 *   更新access token
 *   更新jsapi_ticket
 *
 * 安装crontab示例：
 * 0 * * * * /data1/htdocs/@appname@/bin/job.php Wechat Config updateConfig 2>&1 >> /dev/nul
 */
class Controller_Config extends \Modules\Wechat\Job\Config {}