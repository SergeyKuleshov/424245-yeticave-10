<?php

date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');

$is_auth = rand(0, 1);
$user_name = 'Сергей Кулешов'; // укажите здесь ваше имя

$connect = mysqli_connect("localhost", "root", "1", "yeticave");
mysqli_set_charset($connect, "utf8");

if (!$connect) {
    print("Ошибка подключения: " . mysqli_connect_error());
    exit();
}