<?php
namespace Fort\Log;

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

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\AbstractLogger; 

class Log extends AbstractLogger implements LoggerInterface, Driver {
    use \App\Config\Logger;
    use \Fort\Helper\PropertiesBinder;
    protected $messages = [];
    function __construct()
    {
        $this->bindConfiguration();
    }
    public function log($level, $message, array $context = []) 
    {
        $stamp = date('Y-m-d-H-i');
        if ( !array_key_exists($level, self::levels)) {
			throw new \Exception('undefined logger mode has used');
        }
        if ( !in_array($level, $this->allowedModes)) {
			return $this;
        }
        if(in_array(get_class(), [
            \Fort\Drivers\Log\FileLogger::class,
            \Fort\Drivers\Log\MLogger::class])) {
            $this->interpolate($message, $context);
        }
        $this->messages[] = $stamp."[".$level."]:".$message;
        return $this;
    }
    private function interpolate(&$message , $context = []) 
    {
        var_export($message, $context);
    }
    public function push() {
        echo implode("\n", $this->messages);
        $this->messages = [];
    }
}