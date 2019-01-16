<?php

use Application\Base;
use controller\Controller;

class Welcome extends Controller
{
    public function showForm(\Application\Request $request)
    {
        $this->validate();
        return Base::View('welcome');

    }

    public function storeData()
    {
        return 'Post';
    }

}