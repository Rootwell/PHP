<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
spl_autoload_register(function ($className){
    include $className.".php";
    echo "ya v indexe bil"."<br>";
});

$exceptionGenerator = new ExceptionGenerator();

try {
    $exceptionGenerator->generateException();
} catch (\ownExceptions\PropertyNotFoundException $exception) {
    echo $exception->__toString();
} catch (\ownExceptions\WrongParameterExceptionOwn $exception) {
    echo $exception->__toString();
} catch (\ownExceptions\InputExceptionOwn $exception) {
    echo $exception->__toString();
} catch (\ownExceptions\IOExceptionOwn $exception) {
    echo $exception->__toString();
}
?>
