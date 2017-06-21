<?php

/**
 * Class Controller_Index
 */
class Controller_Index extends Controller_Abstract {
    public function params(){
        return array();
    }

    public function action(){
        $this->response['a'] = 'hello';
    }
}