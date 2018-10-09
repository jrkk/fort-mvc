<?php

namespace Fort\Drivers\Log;

/**
 * Fort
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2018 Fort Abstarct Solutions.
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions: 
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package	Fort 
 * @author	JRKK
 * @since	Version 1.0.0
 * @filesource
 */

use Fort\Log\Log;
use Fort\Log\Driver;

use Fort\Files\FileObject;
use Fort\Files\FileModes;

class FileLogger extends Log implements Driver {
    protected $file;
    private $handler = false;
    function __construct() {
       parent::__construct();
    }
    public function handler() {
        $filepath = "/var/www/html/fort-mvc/storage/logs/example.txt";
        $this->file = new FileObject($filepath, FileModes::CW);
        if($this->file instanceof FileObject ) {  
            chmod($filepath, 0777);  
            return true; 
        }
    }
    public function push() {
        if($this->handler()) {
            foreach( $this->messages as $index => $message ){
                if($this->file->write($message)) {
                    $this->messages = [];        
                }
            }
        }
    }
}