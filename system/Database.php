<?php

namespace Application;


class Database
{
    private static $instance = null;

    private static $db_host;
    private static $db_username;
    private static $db_password;
    private static $db_name;
    private static $port;

    /**
     * Database constructor.
     */
    private function __construct()
    {
        self::init();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private static function init()
    {
        self::$db_host = db_host;
        self::$db_username = db_username;
        self::$db_password = db_password;
        self::$db_name = db_name;
        self::$port = db_port;
    }

    public function select()
    {
        return self::$db_host;
    }
}