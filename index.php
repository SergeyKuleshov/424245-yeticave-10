<?php

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
        "url_picture" => "img/lot-1.jpg"
    ],
    [
        "title" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => $categories[0],
        "price" => 159999,
        "url_picture" => "img/lot-2.jpg"
    ],
    [
        "title" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => $categories[1],
        "price" => 8000,
        "url_picture" => "img/lot-3.jpg"
    ],
    [
        "title" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => $categories[2],
        "price" => 10999,
        "url_picture" => "img/lot-4.jpg"
    ],
    [
        "title" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => $categories[3],
        "price" => 7500,
        "url_picture" => "img/lot-5.jpg"
    ],
    [
        "title" => "Маска Oakley Canopy",
        "category" => $categories[5],
        "price" => 5400,
        "url_picture" => "img/lot-6.jpg"
    ]

];


function formatting_price($number)
{
    $number = ceil($number);
    $number = number_format($number, 0, 0, ' ');
    $number .= '₽';
    return $number;
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