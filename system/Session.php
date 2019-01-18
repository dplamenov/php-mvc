<?php


namespace Application;


class Session
{
    private static $instance = null;

    private function __construct()
    {
    }

    public static function init()
    {
        return self::_init();
    }

    private static function _init()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function put($key, $value)
    {
        global $_SESSION;
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        global $_SESSION;
        return $_SESSION[$key];
    }
}