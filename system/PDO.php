<?php

namespace Application;


class PDO
{
    private $pdo;
    private static $instance = null;

    protected function __construct($dsn, $user, $password)
    {
        $this->pdo = new \PDO($dsn, $user, $password);
    }

    public static function init($dsn, $user, $password)
    {
        if (self::$instance == null) {
            self::$instance = new self($dsn, $user, $password);
        }
    }

    public function query(string $statement, array $param = array())
    {
        $stmt = $this->pdo->prepare($statement);
        if (count($param) > 0) {
            foreach ($param as $key => $item) {
                $stmt->bindParam($key, $item);
            }
        }
        return $stmt->execute();
    }
}