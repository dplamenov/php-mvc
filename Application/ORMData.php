<?php

namespace Application;


class ORMData
{
    private $result;
    private $database;
    private $table;
    private $primaryKey;
    private $id;


    public function __construct($data, $table, $primaryKey, $id)
    {
        $this->result = $data;
        $this->database = Database::init();
        $this->table = $table;

        $this->primaryKey = $primaryKey;
        $this->id = $id;
    }

    public function __set($name, $value)
    {
        $this->result[0]->$name = $value;
    }


    public function __get($name)
    {
        return $this->result->$name;
    }

    public function update()
    {
        foreach ($this->result[0] as $item => $value) {
            $sql = 'UPDATE `' . $this->table . '` SET `' . $item . '` = ' . "$value" . 'WHERE ' . $this->primaryKey . ' = ' . $this->id;
            $this->database->update($sql);
        }
    }
}