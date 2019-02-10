<?php

namespace Application;


class Validation
{
    private $status;
    private $data;
    private $request;
    private $error;

    /**
     * Validation constructor.
     * @param $status
     * @param $data
     * @param $request
     * @param $error
     */
    public function __construct($status, $data, $request, $error)
    {
        $this->status = $status;
        $this->data = $data;
        $this->request = $request;
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        if ($this->status == true) {
            return $this->request;
        }
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function errors()
    {
        foreach ($this->error as &$error) {
            $error .= '.';
        }

        return $this->error;
    }

}