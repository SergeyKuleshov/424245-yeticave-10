<?php

date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');

$is_auth = rand(0, 1);

$user_name = 'Сергей Кулешов'; // укажите здесь ваше имя

$categories = [
    "Доски и лыжи",
    "Крепления",
    "Ботинки",
    "Одежда",
    "Инструменты",
    "Разное"
];

$advertisement = [
    [
        "title" => "2014 Rossignol District Snowboard",
        "category" => $categories[0],
        "price" => 10999,
        "url_picture" => "img/lot-1.jpg",
        "expiration_date" => "2019-08-22"
    ],
    [
        "title" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => $categories[0],
        "price" => 159999,
        "url_picture" => "img/lot-2.jpg",
        "expiration_date" => "2019-08-24"
    ],
    [
        "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => $categories[1],
        "price" => 8000,
        "url_picture" => "img/lot-3.jpg",
        "expiration_date" => "2019-08-25"
    ],
    [
        "title" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => $categories[2],
        "price" => 10999,
        "url_picture" => "img/lot-4.jpg",
        "expiration_date" => "2019-08-26"
    ],
    [
        "title" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => $categories[3],
        "price" => 7500,
        "url_picture" => "img/lot-5.jpg",
        "expiration_date" => "2019-08-27"
    ],
    [
        "title" => "Маска Oakley Canopy",
        "category" => $categories[5],
        "price" => 5400,
        "url_picture" => "img/lot-6.jpg",
        "expiration_date" => "2019-08-28"
    ]

];

function formatting_price($number)
{
    $number = ceil($number);
    $number = number_format($number, 0, 0, ' ');
    $number .= '₽';
    return $number;
}

function get_dt_range($end_time)
{
    $end_time_ts = strtotime($end_time);
    $timestamp = time();
    $diff_time = $end_time_ts - $timestamp;
    $hours_and_minutes = [];

    $hours_in_day = 3600;
    $hours = floor($diff_time / $hours_in_day);
    $formatting_hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $hours_and_minutes["hours"] = $formatting_hours;

    $hours_and_minutes["colon"] = ":";

    $minutes_in_hours = 60;
    $minutes = floor($diff_time % $hours_in_day /   $minutes_in_hours);
    $formatting_minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $hours_and_minutes["minutes"] = $formatting_minutes;
    return $hours_and_minutes;
}


require_once('helpers.php');

$page_content = include_template('main.php', [
    'advertisement' => $advertisement,
    'categories' => $categories
]);

$layout_content = include_template('layout.php', [
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print($layout_content);

?>