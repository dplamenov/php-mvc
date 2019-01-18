<?php


namespace Application;


class Session
{
    protected function __construct()
    {
    }

    public function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }
}