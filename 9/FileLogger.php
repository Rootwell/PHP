<?php

class FileLogger extends Logger
{
    /**
     * @return false|resource
     */
    public function getFileHandler()
    {
        return $this->fileHandler;
    }

    /**
     * @param false|resource $fileHandler
     */
    public function setFileHandler($fileHandler)
    {
        $this->fileHandler = $fileHandler;
    }
    private $filename;
    private $fileHandler;

    /**
     * FileLogger constructor.
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->fileHandler = fopen($filename, "a");
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    function log($line)
    {
        fwrite($this->fileHandler, $line.PHP_EOL);
    }

    public function __destruct()
    {
        fclose($this->fileHandler);
    }
}

?>
