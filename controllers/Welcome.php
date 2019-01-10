<?php

use Application\Base;

class Welcome
{
    public function index()
    {
        return Base::View('welcome', ['data' => 'data']);
    }

    public function index2(){

    }

}