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
        $result = $this->database->select('SELECT * FROM ' . $this->_tableName . ' WHERE ' . $this->_primaryKey . ' = ?', [$id]);
        return $result;
    }

    private function init($tableName, $primaryKey)
    {
        $this->_primaryKey = $primaryKey;
        $this->_tableName = $tableName;
        $this->database = Database::init();
    }
}