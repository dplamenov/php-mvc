<?php

namespace Application;


class Validation
{
    private $status;
    private $data;
    private $request;

    public function __construct($status, $data, $request)
    {
        $this->status = $status;
        $this->data = $data;
        $this->request = $request;
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
}