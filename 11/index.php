<?php

spl_autoload_register();

include ("vendor/autoload.php");

use logger\LoggerCaller;

$fileName = "logs.json";
$logger = new LoggerCaller($fileName);
$logger->logIt("debug", "debug message");
$logger->logIt("nothislog","nothing");
