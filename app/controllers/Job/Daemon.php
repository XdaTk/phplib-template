<?php

/**
 * Class Controller_Job_Daemon
 *
 * @description daemon脚本示范
 *
 *              备注:
 *              1. 执行命令示范: nohup /data1/htdocs/demo/bin/job -c Job_Daemon >> /data1/logs/demo/daemon.log 2>&1 &
 *              2. 注意内存分配情况;
 *              3. 关键信息添加日志记录或输出, 以追踪脚本执行情况;
 */
class Controller_Job_Daemon extends \Base\Controller\Job {

    protected function indexAction() {
        $config = new \S\Thread\Config();
        $config->setWorkerConfig("\\Service\\Daemon\\Demo", 1);

        (new \S\Thread\Master())->main();
    }

}