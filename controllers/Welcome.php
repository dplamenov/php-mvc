<?php

use Application\Base;


class Welcome
{
    public function index()
    {
        $log = new \Application\Logger();
        return Base::View('welcome', []);


    }

    public function index2()
    {
        return 'Post';
    }

}