<?php

namespace logger;

use Psr\Log\LoggerInterface;

class CustomLogger implements LoggerInterface
{
    private string $filename;

    /**
     * CustomLogger constructor.
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @inheritDoc
     */
    public function emergency($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function alert($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function critical($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function error($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function warning($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function notice($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function info($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function debug($message, array $context = array())
    {
        $this->writeMessage(__FUNCTION__, $message);
    }

    /**
     * @inheritDoc
     */
    public function log($level, $message, array $context = array())
    {
        switch ($level) {
            case "debug":
                $this->debug($message, $context);
                break;
            case "info":
                $this->info($message, $context);
                break;
            case "notice":
                $this->notice($message, $context);
                break;
            case "warning":
                $this->warning($message, $context);
                break;
            case "error":
                $this->error($message, $context);
                break;
            case "critical":
                $this->critical($message, $context);
                break;
            case "alert":
                $this->alert($message, $context);
                break;
            case "emergency":
                $this->emergency($message, $context);
                break;
            default:
                echo "No log level available with name: ".$level;
        }
    }

    private function writeMessage(string $level, string $message)
    {
        $newLog = array(
            "type" => $level,
            "time" => date("c"),
            "content" => $message
        );
        $jsonDecoded = json_decode(file_get_contents($this->filename), true);
        $fileContentArray = $jsonDecoded;
        $fileContentArray[] = $newLog;
        file_put_contents($this->filename, json_encode($fileContentArray),FILE_APPEND | LOCK_EX);
    }
}
