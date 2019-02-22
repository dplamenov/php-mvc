<?php

namespace Models;


use Application\Model;

class User extends Model
{
    protected $tableName = 'users';
    protected $primaryKey = 'user_id';
}