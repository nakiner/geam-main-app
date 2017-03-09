<?php

namespace ovl\app\brain;
use ovl\app\controllers;

class View
{
    public $data;
    private static $obj;

    public static function C()
    {
        if (empty(self::$obj)) self::$obj = new self();
        return self::$obj;
    }

    public function render($name)
    {
        return file_exists("app/views/$name.php") ? require_once("app/views/$name.php") : print new \Exception("Not exist: $name.php");
    }

    public function set($idx ,$data)
    {
        $this->data[$idx] = $data;
    }

    public function __destruct()
    {
        unset($this->data);
    }
}
