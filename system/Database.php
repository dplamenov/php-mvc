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
        include_once '../config/database/database.php';
        self::$db_host = db_host;
        self::$db_username = db_username;
        self::$db_password = db_password;
        self::$db_name = db_name;
        self::$port = db_port;

        self::$database = new \mysqli(self::$db_host, self::$db_username, self::$db_password, self::$db_name, self::$port);
    }

    public function select(string $sql, $data = array())
    {
        if (count($data) == 0) {
            $r = mysqli_query(self::$database, $sql);
            if ($r->num_rows > 1) {
                for ($counter = 1; $counter <= $r->num_rows; $counter++) {
                    $result[$counter] = $r->fetch_object();
                }
            } elseif ($r->num_rows == 1) {
                $result[0] = $r->fetch_object();
            }
        } else {

            $count = substr_count($sql, '?');
            $counter = 0;
            while ($count != 0) {
                if (is_string($data[$counter])) {
                    $sql = substr_replace($sql, "'$data[$counter]'", strpos($sql, '?', strpos($sql, '?') + $counter), 0);
                } else {
                    $sql = substr_replace($sql, $data[$counter], strpos($sql, '?', strpos($sql, '?') + $counter), 0);
                }


                $counter++;
                $count--;
            }
            $sql = str_replace('?', '', $sql);
            echo $sql;
            $r = mysqli_query(self::$database, $sql);
            if ($r->num_rows > 1) {
                for ($counter = 1; $counter <= $r->num_rows; $counter++) {
                    $result[$counter] = $r->fetch_object();
                }
            } elseif ($r->num_rows == 1) {
                $result[0] = $r->fetch_object();
            }

        }
        return $result;
    }
}