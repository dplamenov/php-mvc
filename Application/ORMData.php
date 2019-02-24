<?php

namespace Application;


class ORMData
{
    private $result;
    private $database;
    private $table;


    public function __construct($data, $table)
    {
        $this->result = $data;
        $this->database = Database::init();
        $this->table = $table;
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
            $sql = 'UPDATE `' . $this->table . '` SET `' . $item . '` = ' . "$value";
            echo $sql . '<br>';
            $this->database->update($sql);
        }
        echo '<pre>' . print_r($this->result, true) . '</pre>';
    }
}