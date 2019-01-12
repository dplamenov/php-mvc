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

    private static $database;

    /**
     * Database constructor.
     */
    private function __construct()
    {
        self::_init();
    }

    public static function init()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private static function _init()
    {
        self::$db_host = db_host;
        self::$db_username = db_username;
        self::$db_password = db_password;
        self::$db_name = db_name;
        self::$port = db_port;

        self::$database = mysqli_connect(self::$db_host,self::$db_username,self::$db_password,self::$db_name,self::$port);
    }

    public function select(string $sql, $data = array())
    {
        return self::$db_host;
    }
}