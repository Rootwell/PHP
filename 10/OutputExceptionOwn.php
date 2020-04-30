<?php
namespace ownExceptions;

class OutputExceptionOwn extends IOExceptionOwn
{
    public function __toString()
    {
        return __CLASS__." OutputException occured: |$this->code| : |$this->message|\n";
    }
}

?>
