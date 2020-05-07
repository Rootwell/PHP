<?php
namespace ownExceptions;
use Exception;
use Throwable;
class IOExceptionOwn extends Exception{
    public function __toString()
    {
        return __CLASS__." IOException occured: |$this->code| : |$this->message|\n";
    }
}
?>
