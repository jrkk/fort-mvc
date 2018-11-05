<?php

namespace App\Bus\Controller;

class HomeController extends BaseController {

    public function indexAction() {
        echo __CLASS__.'::'.__FUNCTION__;
        $this->getAction();
    }
    public function getAction() {
        echo "FROM ::".__FUNCTION__; 
        var_export($this->uri);
        var_export($this->request);
        var_export($this->response);
    }
}