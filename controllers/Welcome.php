<?php

use Application\Base;

class Welcome
{
    public function showForm()
    {
        return Base::View('welcome');
    }

    public function storeData()
    {
        return 'Post';
    }

}