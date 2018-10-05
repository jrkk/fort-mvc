<?php

namespace App\Bus\Controller;

class HomeController extends BaseController {
    function __construct()
    {
        parent::__construct();
    }
    public function indexAction() {
        echo __CLASS__.'::'.__FUNCTION__;
    }
}