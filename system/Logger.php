<?php

namespace Application;

use Monolog\Logger as log;
use Monolog\Handler\StreamHandler;


class Logger
{
    private $logger;
    public function __construct()
    {
        $loggger = new log('log');
        $loggger->pushHandler(new StreamHandler('../log.log', log::WARNING));
        $this->logger = $loggger;
    }
    public function error($msg){
        $this->logger->error($msg);
    }

    public function warning($msg){
        $this->logger->warning($msg);
    }
}