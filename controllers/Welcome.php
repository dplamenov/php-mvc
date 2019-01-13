<?php

use Application\Base;

class Welcome
{
    public function showForm(\Application\Request $request)
    {
        var_dump($request);
        var_dump($request->get());
        return Base::View('welcome');
    }

    public function storeData()
    {
        return 'Post';
    }

}