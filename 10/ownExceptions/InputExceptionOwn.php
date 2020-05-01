<?php
namespace ownExceptions;
use Throwable;
class InputExceptionOwn extends IOExceptionOwn
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__." InputException occured: |$this->code| : |$this->message|\n";
    }
}

?>
