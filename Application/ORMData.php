<?php

namespace Application;


class ORMData
{
    private $result;
    private $database;
    public function __construct($data)
    {
        $this->result = $data;
        $this->database = Database::init();
    }

    public function __set($name, $value)
    {
        $this->result[0]->$name = $value;
    }


    public function __get($name)
    {
        return $this->result->$name;
    }

    public function save()
    {

        echo '<pre>' . print_r($this->result, true) . '</pre>';
    }
}