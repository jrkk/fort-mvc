<?php

namespace Fort\Files;

class FileObject extends \SplFileObject {
    public function write($content) {
        var_export(__CLASS__."::".__FUNCTION__);
        var_export($content);
    }
}