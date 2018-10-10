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

use Fort\Config;

use Fort\Log\Log;
use Fort\Log\Driver;

use Fort\Files\FileObject;
use Fort\Files\FileModes;
use Fort\Exception\FileNotWritableException;

class FileLogger extends Log implements Driver {
    protected $file;

    protected $ext = '.log';
    protected $path = Config::BASEPATH.'storage'. Config::DELIMITER .'logs';
    protected $filePrefix = 'log-';
    protected $permission = 0755;
    protected $stamp = 'Y-m-d-h-i';

    private $name = '';
    protected $delimiter = "\n";

    function __construct() {
       parent::__construct();
    }
    public function handler() {
        if($this->name === '') {
            $dt = new \DateTimeImmutable('now');
            $this->name = $dt->format($this->stamp);
            unset($dt);
        }
        $filepath = $this->getFilePath();
        $this->file = new FileObject($filepath, FileModes::CW);
        if($this->file instanceof FileObject ) {  
            chmod($filepath, $this->permission);  
            return true; 
        }
    }
    public function push($name = '') {  
        $this->name = $name;
        if($this->handler()) {
            if(!$this->file->isWritable())
                throw new FileNotWritableException('File not opened with write permissions');
            foreach( $this->messages as $index => $message ){
                $message = "{$message}{$this->delimiter}";
                $this->file->fwrite($message, strlen($message));
            }
            $this->messages = []; 
        }
    }
    private function getFilePath() {
        // generate the file path
        $filename = "{$this->filePrefix}{$this->name}{$this->ext}";
        $filepath = $this->path.Config::DELIMITER.$filename;
        
        return $filepath;
        
    }
}