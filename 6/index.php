<?php
function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

$array = parse_ini_file("index.ini", true);
$filename = $array['main']['filename'];
$rules[] = $array['first_rule'];
$rules[] = $array['second_rule'];
$rules[] = $array['third_rule'];
$filedescript = fopen($filename, "r");
while (!feof($filedescript)) {
    $current_string = fgets($filedescript);
    if (startsWith($current_string, $rules[0]['symbol'])) {
        if ($rules[0]['upper'] == true) {
            echo (strtoupper($current_string)) . '<br>';
            continue;
        }
        if ($rules[0]['upper'] == false) {
            echo (strtolower($current_string)) . '<br>';
            continue;
        }
        echo 'unexpected upper value in .ini file' . '<br>';
        continue;
    }
    if (startsWith($current_string, $rules[1]['symbol'])) {
        if ($rules[1]['direction'] === "+") {
            echo strtr($current_string, "0123456789", "1234567890") . '<br>';
            continue;
        }
        if ($rules[1]['direction'] === "-") {
            echo strtr($current_string, "0123456789", "9012345678") . '<br>';
            continue;
        }
        echo 'unexpected direction value in .ini file' . '<br>';
        continue;

    }
    if (startsWith($current_string, $rules[2]['symbol'])) {
        if (strlen($rules[2]['delete']) == 1) {
            echo strtr($current_string, $rules[2]['delete'], '') . '<br>';
        } else {
            echo 'only single characters allowed in delete in .ini file' . '<br>';
        }
        continue;
    }
    echo 'unknown command number at the start of line' . '<br>';
}
?>
