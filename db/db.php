<?php

// параметры, которые принимает функция mysqli_connect - ИМЯ ХОСТА, ИМЯ ПОЛЬЗОВАТЕЛЯ БД, ПАРОЛЬ ПОЛЬЗОВАТЕЛЯ, БД
$link = mysqli_connect("localhost", "estate_fund", "123456", "estate_fun");

// если подключение не произошло, выводим сообщение об ошибке
if(!$link) {
    echo "err mysqli";
}

?>