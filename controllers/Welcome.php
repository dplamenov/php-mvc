<?php

use Application\Base;

class Welcome
{
    public function showForm()
    {
        $database = \Application\Database::init();
        return Base::View('welcome');


    }

    public function storeData()
    {
        return 'Post';
    }

}