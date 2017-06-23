<?php

/**
 * Class Controller_Consumer_Demo
 */
class Controller_Consumer_Demo extends \Base\Controller\Consumer{

    protected function doSthAction() {
        $name   = $this->getParams('name');
        $mobile = $this->getParams('mobile');

        \S\Log\Logger::getInstance()->debug(array("demo_msg", $name, $mobile));
    }

}