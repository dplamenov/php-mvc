<?php

namespace Application;

trait ORM
{
    private $_primaryKey;
    private $_tableName = 'id';

    public function find(int $id)
    {

    }

    private function init($primaryKey, $tableName)
    {
        echo $primaryKey;
        echo $tableName;
    }
}