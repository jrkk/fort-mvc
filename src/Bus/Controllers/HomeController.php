<?php

namespace App\Bus;

class Home extends ApiController {

    function defaultAction() {
        
    }

    function getAction() {
        call_user_func_array(self::defaltAction,func_get_args());
    }

}