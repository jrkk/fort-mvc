<?php

namespace Fort\Log;

interface Driver {
    const levels = [
		'emergency'	 => 1,
		'alert'		 => 2,
		'critical'	 => 3,
		'error'		 => 4,
		'warning'	 => 5,
		'notice'	 => 6,
		'info'	 	 => 7,
		'debug'		 => 8,
	];
    public function push();
}