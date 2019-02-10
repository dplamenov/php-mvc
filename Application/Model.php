<?php

namespace Application;


class Model
{
    use ORM;
    protected $tableName;
    protected $primaryKey = 'id';

    private function _init($tableName, $primaryKey)
    {
        $this->init($tableName, $primaryKey);
    }

    public function __construct()
    {
        $this->_init($this->tableName, $this->primaryKey);
    }

}