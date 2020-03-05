<?php
if (isset($_REQUEST["innerText"])) {
    $innerText = $_REQUEST["innerText"];
    $innerText = trim($innerText);
    $arrayOfStrings = explode(PHP_EOL, $innerText);
    $onemorearray = array();
    foreach ($arrayOfStrings as $value) {
        array_push($onemorearray, $value);
    }

    foreach ($onemorearray as &$value) {
        $value = explode(" ", $value);
        shuffle($value);
    }

    unset($value);
    foreach ($arrayOfStrings as $value) {
        array_push($onemorearray, explode(" ", $value));
    }

    uasort($onemorearray, function ($elem1, $elem2) {
        return strcmp($elem1[1], $elem2[1]);
    });

    foreach ($onemorearray as $value) {
        echo implode(" ", $value);
        echo "<br>";
    }

} else {
    echo "Empty textarea";
}

?>