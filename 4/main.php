<?php
$strings = $_REQUEST["entryText"];
$strings = trim($strings);
$strings = explode(PHP_EOL, $strings);
$totalWeight = 0;
foreach ($strings as $value) {
    $totalWeight += (explode(" ", $value))[1];
}

$forEncode = [
    "sum" => $totalWeight,
    "data" => []
];
foreach ($strings as $value) {
    $currentweight = (explode(" ", $value))[1];
    $data = [
        "text" => explode(" ", $value)[0],
        "weight" => $currentweight,
        "probability" => round($currentweight / $totalWeight, 2)
    ];
    $forEncode["data"][] = $data;
}

function makeValueAndSpaceArray($strings)
{
    $stringAndProb = array();
    foreach ($strings as $value) {
        $key = explode(" ", $value)[0];
        $curValue = explode(" ", $value[1]);
        $stringAndProb += [$key => $curValue];
    }
    arsort($stringAndProb);

    $max = 0;
    $weights = [];
    foreach ($stringAndProb as $key => $value) {
        $max = $max + $value;
        $weights[$max] = $key;
    }

    return $weights;
}

function randomUseSpasec($strings)
{
    $valueToReturn = "error";
    $weights = makeValueAndSpaceArray($strings);

    $randomByMax = mt_rand();

    foreach ($weights as $key => $value) {
        if ($randomByMax) {
            break;
        }
    }
}

echo("<pre>");
echo(json_encode($forEncode, JSON_PRETTY_PRINT));
echo("</pre>")
?>
