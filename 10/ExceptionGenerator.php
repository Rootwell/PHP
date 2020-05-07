<?php

class ExceptionGenerator
{
    public function generateException()
    {
        $case = rand(1, 5);
        switch ($case) {
            case 1:
                throw new \ownExceptions\IOExceptionOwn("ioexception");
                break;
            case 2:
                throw new \ownExceptions\InputExceptionOwn("inputexception");
                break;
            case 3:
                throw new \ownExceptions\OutputExceptionOwn("outputexception");
                break;
            case 4:
                throw new \ownExceptions\WrongParameterExceptionOwn("wrongparamexception");
                break;
            case 5:
                throw new \ownExceptions\PropertyNotFoundException("propertynotfoundexception");
                break;
            default:
                throw new Exception("smth really gone wrong");
        }
    }
}

?>
