<?php

namespace Application;


class Request extends Session
{
    public function get()
    {
        return (object)$_GET;
    }

    public function post()
    {
        return (object)$_POST;
    }

    public function session()
    {
        return new Session();
    }


}