<?php

namespace Application;

trait ORM
{
    private $_primaryKey;
    private $_tableName;

    /**
     * @var Database
     */
    private $database;

    public function find(int $id)
    {
        return $this->database->select('SELECT * FROM ' . $this->_tableName . ' WHERE ' . $this->_primaryKey . ' = ?', [$id]);
    }

    public function where($column, $operator, $value)
    {

    }

    private function init($tableName, $primaryKey)
    {
        $this->_primaryKey = $primaryKey;
        $this->_tableName = $tableName;
        $this->database = Database::init();
    }
}