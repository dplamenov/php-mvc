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
        mysqli_report(MYSQLI_REPORT_STRICT);
        try{
            self::$database = new \mysqli(self::$db_host, self::$db_username, self::$db_password, self::$db_name, self::$port);
        }catch (\Exception $exception){
            echo '<h1 style="color: red">'.$exception->getMessage().'</h1>';
            exit;
        }

    }

    public function select(string $sql, $data = array())
    {
        if (count($data) == 0) {
            $raw_result = mysqli_query(self::$database, $sql);
            if ($raw_result->num_rows > 1) {
                for ($counter = 1; $counter <= $raw_result->num_rows; $counter++) {
                    $result[$counter] = $raw_result->fetch_object();
                }
            } elseif ($raw_result->num_rows == 1) {
                $result[0] = $raw_result->fetch_object();
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
            $raw_result = mysqli_query(self::$database, $sql);
            if ($raw_result->num_rows > 1) {
                for ($counter = 1; $counter <= $raw_result->num_rows; $counter++) {
                    $result[$counter] = $raw_result->fetch_object();
                }
            } elseif ($raw_result->num_rows == 1) {
                $result[0] = $raw_result->fetch_object();
            }

        }
        return $result;
    }
}