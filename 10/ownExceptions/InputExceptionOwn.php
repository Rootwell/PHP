<?php
namespace ownExceptions;
use Throwable;
class InputExceptionOwn extends IOExceptionOwn
{
    public function __toString()
    {
        return __CLASS__." InputException occured: |$this->code| : |$this->message|\n";
    }
}

?>
