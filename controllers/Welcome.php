<?php

use Application\Base;
use controller\Controller;

class Welcome extends Controller
{
    public function showForm(\Application\Request $request)
    {

        return Base::View('welcome');

    }

    public function storeData(\Application\Request $request)
    {

        $this->validate($request, [
            'name' => 'min:5',
            'ms' => 'max:2'
        ]);
    }

}