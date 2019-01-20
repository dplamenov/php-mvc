<?php

namespace Application;


class Validation
{
    private $status;
    private $data;
    private $request;
    private $error;

    public function __construct($status, $data, $request, $error)
    {
        $this->status = $status;
        $this->data = $data;
        $this->request = $request;
        $this->error = $error;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getData()
    {
        if ($this->status == true) {
            return $this->request;
        }
        return $this->status;
    }

    public function errors()
    {
        return $this->error;
    }

}