<?php
include "Logger.php";
include "FileLogger.php";
include "BrowserLogger.php";
$logType = $_REQUEST["logWay"];
$entryText = $_REQUEST["entryText"];
$entryText = trim($entryText);
$entryText = explode(PHP_EOL, $entryText);
switch ($logType) {
    case "File":
        $logger = new FileLogger($_REQUEST["fileName"]);
        break;
    case "Browser":
        $logger = new BrowserLogger($_REQUEST["params"]);
        break;
}
foreach ($entryText as $line) {
    $prefix = (preg_match("![A-Z|А-Я]!u", $line))?" ":" не";
    $logger->log("\"".$line."\"" . $prefix . " содержит заглавную букву");
}
?>
