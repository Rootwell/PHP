<?php

namespace ownExceptions;
class PropertyNotFoundException extends WrongParameterExceptionOwn
{
    public function __toString()
    {
        return __CLASS__." PropertyNotFoundException occured: |$this->code| : |$this->message|\n";
    }
}

?>