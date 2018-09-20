<?php

namespace App\Config\Enums;

class HttpMethods {

    const GET = 'get';
    const POST = 'post';
    const PUT = 'put';
    const PATCH = 'patch';
    const DELETE = 'delete';
    const COPY = 'copy';
    const HEAD = 'head';
    const OPTIONS = 'options';
    const LINK = 'link';
    const UNLINK = 'unlink';
    const PURGE = 'purge';
    const LOCK = 'lock';
    const UNLOCK = 'unlock';
    const PROPFIND = 'propfind';
    const VIEW = 'view';

    public static function isValidMethod($method) {
        $method = strtolower($method);
        return defind(self::$method) ? true : false;
    }
}