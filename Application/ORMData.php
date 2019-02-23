<?php

namespace Application;


class ORMData
{
    private $result;

    public function __construct($data)
    {
        $this->result = $data;
    }

    public function __set($name, $value)
    {
        $this->result[$name] = $value;
    }


    public function __get($name)
    {
        return $this->result[0]->$name;
    }

    public function save()
    {

    }
}