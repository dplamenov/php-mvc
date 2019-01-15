<?php

use Application\Base;

class Welcome
{
    public function showForm(\Application\Request $request)
    {

        return Base::View('welcome');

    }

    public function storeData()
    {
        return 'Post';
    }

}