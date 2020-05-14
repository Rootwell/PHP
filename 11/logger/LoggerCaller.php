<?php

namespace logger;

use logger\CustomLogger;

class LoggerCaller
{
    private CustomLogger $customLogger;

    /**
     * LoggerCaller constructor.
     * @param CustomLogger $customLogger
     */
    public function __construct(string $filename)
    {
        $this->customLogger = new CustomLogger($filename);
    }

    public function logIt(string $level, string $message){
        $this->customLogger->log($level, $message);
    }


}
