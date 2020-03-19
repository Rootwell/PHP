<?php
$password = $_REQUEST["password"];
function compileRegEx($password)
{
    if (!preg_match('/.{10,}/', $password)) {
        return "В пароле меньше 10 символов";
    }

    if (!preg_match('/.*[A-Z].*[A-Z].*/', $password)) {
        return "В пароле менее двух прописных букв латинского алфавита";
    }

    if (!preg_match('/.*[a-z].*[a-z].*/', $password)) {
        return "В пароле менее двух строчных букв латинского алфавита";
    }

    if (!preg_match('/\d/', $password)) {
        return "В пароле нет цифр";
    }

    if (!preg_match('/[%$#_*]/', $password)) {
        return "В пароле нет специальных символов";
    }

    if (!preg_match('/\d/', $password)) {
        return "В пароле нет цифр";
    }

    if (preg_match('/[A-Z]{3,}/', $password)) {
        return "В пароле больше 2 подряд идущих прописных символов латинского алфавита";
    }

    if (preg_match('/[a-z]{3,}/', $password)) {
        return "В пароле больше 2 подряд идущих строчных символов латинского алфавита";
    }

    if (preg_match('/\d{3,}/', $password)) {
        return "В пароле больше 2 подряд идущих цифр";
    }

    if (preg_match('/[%$#_*]{3,}/', $password)) {
        return "В пароле больше 2 подряд идущих специальных символов";
    }

    return "200";
}

if (($toreturn = compileRegEx($password)) !== "200") {
    echo $toreturn;
    echo "<br>";
    echo "<a href='index.php'>Назад</a>";
} else {
    echo "<img src='https://i.imgur.com/HpzfxID.jpg'>";
}

?>
