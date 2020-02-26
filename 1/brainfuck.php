<?php
$code = $_REQUEST["bf"];
$input = $_REQUEST["input"];
//var_dump($code."\n");
//var_dump($input."\n");
$arraycells = [];
for ($i = 0; $i < 256; $i++) {
    $arraycells[$i] = $i;
}
//var_dump($arraycells);
$c = 0;
$output = "";
$arraycellspoint = 0;
$inputpoint = 0;
for ($codepoint = 0; $codepoint < strlen($code); $codepoint++) {
    switch ($code[$codepoint]) {
        case ">":
            if ($arraycellspoint == count($arraycells) - 1) {
                $arraycellspoint = 0;
            } else {
                $arraycellspoint++;
            }
            break;
        case "<":
            if ($arraycellspoint == 0) {
                $arraycellspoint = count($arraycells) - 1;
            } else {
                $arraycellspoint--;
            }
            break;
        case "+":
            $arraycells[$arraycellspoint]++;
            break;
        case "-":
            $arraycells[$arraycellspoint]--;
            break;
        case ".":
            $output = $output . chr($arraycells[$arraycellspoint]);
            break;
        case ",":
            $arraycells[$arraycellspoint] = ord($input[$inputpoint]);
            $inputpoint++;
            break;
        case "[":
            if ($arraycells[$arraycellspoint] == 0) {
                $codepoint++;
                while ($c > 0 || $code[$codepoint] != "]") {
                    if ($code[$codepoint] == "[")
                        $c++;
                    elseif ($code[$codepoint] == "]")
                        $c--;
                    $codepoint++;
                }
            }
            break;
        case "]":
            if ($arraycells[$arraycellspoint] != 0) {
                $codepoint--;
                while ($c > 0 || $code[$codepoint] != "[") {
                    if ($code[$codepoint] == "]")
                        $c++;
                    elseif ($code[$codepoint] == "[")
                        $c--;
                    $codepoint--;
                }
                $codepoint--;
            }
            break;
    }
}
echo ($output);
?>
