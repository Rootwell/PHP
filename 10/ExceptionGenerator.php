<?php
spl_autoload_register();
class ExceptionGenerator
{
    public function generateException()
    {
        $case = rand(1, 5);
        switch ($case) {
            case 1:
                return new \ownExceptions\IOExceptionOwn("ioexception");
                break;
            case 2:
                return new \ownExceptions\InputExceptionOwn("inputexception");
                break;
            case 3:
                return new \ownExceptions\OutputExceptionOwn("outputexception");
                break;
            case 4:
                return new \ownExceptions\WrongParameterExceptionOwn("wrongparamexception");
                break;
            case 5:
                return new \ownExceptions\PropertyNotFoundException("propertynotfoundexception");
                break;
            default:
                return new Exception("smth really gone wrong");
        }
    }
}

?>
