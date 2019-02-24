<?php

namespace Application;

trait ORM
{
    private $_primaryKey;
    private $_tableName;

    private $result;
    private $dynamicData = array();

    /**
     * @var Database
     */
    private $database;

    public function find(int $id)
    {
        $data = $this->database->select('SELECT * FROM ' . $this->_tableName . ' WHERE ' . $this->_primaryKey . ' = ?', [$id]);

        return new ORMData($data, $this->_tableName, $this->_primaryKey, $id);
    }

    public function where($column, $operator, $value)
    {
        return $this->database->select("SELECT * FROM " . $this->_tableName . " WHERE $column $operator $value");
    }

    private function init($tableName, $primaryKey)
    {
        $this->_primaryKey = $primaryKey;
        $this->_tableName = $tableName;
        $this->database = Database::init();
    }



}