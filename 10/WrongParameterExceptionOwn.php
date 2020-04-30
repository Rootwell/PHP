<?php

namespace ownExceptions;
class WrongParameterExceptionOwn extends InputExceptionOwn
{
    public function __toString()
    {
        return __CLASS__." WrongParameterException occured: |$this->code| : |$this->message|\n";
    }
}

?>