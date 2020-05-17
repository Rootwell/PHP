<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

session_name("proxy_session");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["inputText"] = $_REQUEST["inputText"];
    $inputText = $_REQUEST["inputText"];
    $link = "http://127.0.0.1:4001";
    $settings = array(
        "http" => array(
            "method" => "POST",
            "content" => "inputText=$inputText"
        )
    );
    echo file_get_contents($link, false, stream_context_create($settings));
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_SESSION["inputText"]) || $_SESSION["$inputText"] == false) {
        include "hiddenScript/forma.html";
    } else {
        $inputText = $_SESSION["inputText"];
        echo "<form action=\"index.php\" method=\"post\">
    string:
    <label>
        <input type=\"text\" name=\"inputText\" value='$inputText'> </input>
    </label>
    <input type=\"submit\" value=\"13375 1337 17\">
</form>";
    }
}
