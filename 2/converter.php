<?php
$input = $_REQUEST["input"];
function mainFunc($string)
{
    $toreturn = "";
    $convertString = convert($string);
    foreach ($convertString as $value) {
        $toreturn = $toreturn.$value;
        echo $value;
    }
    $count = $convertString -> getReturn();
    echo "<br> count of swaps $count";
    return $toreturn;
}

function convert($string)
{
    $counter = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        switch ($string[$i]) {
            case "h":
                $counter++;
                yield "4";
                break;
            case "l":
                $counter++;
                yield "1";
                break;
            case "e":
                $counter++;
                yield "3";
                break;
            case "o":
                $counter++;
                yield "0";
                break;
            default:
                yield $string[$i];
                break;
        }
    }
    return $counter;
}

mainFunc($input);
?>