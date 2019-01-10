<?php

use Application\Base;


class Welcome
{
    public function index()
    {
        return Base::View('welcome', []);
    }

    public function index2()
    {
    }

}