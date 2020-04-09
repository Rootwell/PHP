<?php
set_time_limit(0);
$link = $_REQUEST["link"];
$type = $_REQUEST["type"];
$ipregex = "/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/";
$command = $type . " " . $link;
$response = array();
exec($command, $response);
mb_convert_variables("UTF-8", "cp866", $response);
//var_dump($response);
switch ($type) {
    case "ping":
        if (sizeof($response) == 2) {
            echo "При попытке соединения с " . $link . " произошла ошибка, проверьте ссылку и повторите попытку";
        } else {
            $matches = array();
            preg_match($ipregex, $response[1], $matches);
            $ipaddress = $matches[0];
            preg_match("/\d+/", $response[9], $matches);
            $succesfull = (100 - (int)$matches[0]) . "%";
            echo "Попытка соединения с " . $link . " — <strong>" . $ipaddress . "</strong> успешна <br>"
                . $succesfull . " успешных запросов";
        }
        break;
    case "tracert":
        if (sizeof($response) == 1) {
            echo "При попытке трассировки до " . $link . " произошла ошибка, проверьте ссылку и повторите попытку";
        } else {
            $matches = array();
            preg_match($ipregex, $response[1], $matches);
            $ipaddress = $matches[0];
            echo "Попытка трассировки с " . $link . " — <strong>" . $ipaddress . "</strong> успешна <br>";
            for ($i = 3; $i < sizeof($response) - 2; $i++) {
                if (preg_match($ipregex, $response[$i], $matches)) {
                    $ipaddress = $matches[0];
                    echo $ipaddress . "   ";
                }
            }
        }
        break;
}
?>
