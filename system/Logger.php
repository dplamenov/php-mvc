<?php

namespace Application;

use Monolog\Logger as log;
use Monolog\Handler\StreamHandler;


class Logger
{
    private $logger;
    public function __construct()
    {
        include "../config/logger.php";
        $log_file = '../'.logfile;
        $loggger = new log('log');

        $loggger->pushHandler(new StreamHandler($log_file, log::WARNING));
        $this->logger = $loggger;
    }
    public function error($msg){
        $this->logger->error($msg);
    }

    public function warning($msg){
        $this->logger->warning($msg);
    }

}