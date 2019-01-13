<?php

namespace Application;


class Request
{
    protected function __construct()
    {

    }

    public function get()
    {
        return (object)$_GET;
    }
}