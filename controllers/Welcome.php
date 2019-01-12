<?php

use Application\Base;
use Application\Database;

class Welcome
{
    public function showForm()
    {
        return Base::View('welcome', []);


    }

    public function storeData()
    {
        return 'Post';
    }

}