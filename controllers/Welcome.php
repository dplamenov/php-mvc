<?php

use Application\Base;

class Welcome
{
    public function showForm()
    {
       
        $log = new \Application\Logger();
        return Base::View('welcome');
    }

    public function storeData()
    {
        return 'Post';
    }

}