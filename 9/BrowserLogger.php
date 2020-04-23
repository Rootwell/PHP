<?php
class BrowserLogger extends Logger
{
    private $logParam;

    /**
     * BrowserLogger constructor.
     * @param $logParam
     */
    public function __construct($logParam)
    {
        $this->logParam = $logParam;
    }

    /**
     * BrowserLogger constructor.
     */


    /**
     * @return mixed
     */
    public function getLogParam()
    {
        return $this->logParam;
    }

    /**
     * @param mixed $logParam
     */
    public function setLogParam($logParam)
    {
        $this->logParam = $logParam;
    }

    function log($line)
    {
        switch ($this->logParam) {
            case "noParams":
                echo $line . "<br>";
                break;
            default:
                echo date($this->logParam) ." ". $line . "<br>";
                break;
        }
    }
}

?>
