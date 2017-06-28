<?php

/**
 * Class Controller_Jobs_Tmp_Demo
 *
 * @description 临时脚本示范
 *
 *              备注:
 *              1. 执行命令示范: /data1/htdocs/demo/bin/job -m Index -c Job_Tmp_Demo -a doSth name=xin mobile=18512341234
 *              2. 注意内存分配情况;
 *              3. 关键信息添加日志记录或输出, 以追踪脚本执行情况;
 */
class Controller_Job_Tmp_Demo extends \Base\Controller\Job {

    protected function doSthAction() {
        $name   = $this->getParams('name');
        $mobile = $this->getParams('mobile');

        \S\Log\Logger::getInstance()->debug(array("demo_msg", $name, $mobile));
    }

}