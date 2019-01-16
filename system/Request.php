<?php

namespace Application;


class Request
{
    public function get()
    {
        return (object)$_GET;
    }

    public function post()
    {
        return (object)$_POST;
    }


}