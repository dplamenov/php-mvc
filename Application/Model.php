<?php

namespace Application;


class Model
{
    use ORM;
    protected $tableName;
    protected $primaryKey = 'id';

}