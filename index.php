<?php

date_default_timezone_set("Europe/Moscow");
setlocale(LC_ALL, 'ru_RU');

$is_auth = rand(0, 1);

$user_name = 'Сергей Кулешов'; // укажите здесь ваше имя



$connect = mysqli_connect("localhost", "root", "1", "yeticave");
mysqli_set_charset($connect, "utf8");



if ($connect == false) {
    print("Ошибка подключения: " . mysqli_connect_error());
}
else {
    $sql_cat = "SELECT title, char_code FROM categories";
}

$result = mysqli_query($connect, $sql_cat);

if ($result) {
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
}




if ($connect == false) {
    print("Ошибка подключения: " . mysqli_connect_error());
}
else {
    $sql_adv = "SELECT l.title, c.title category, start_price, offer_price price, picture_path url_picture, l.dt_add expiration_date FROM lots l"
    . " JOIN categories c ON l.cat_id = c.id"
    . " LEFT JOIN bids b ON l.id = b.lot_id"
    . " WHERE l.dt_add >= NOW()"
    . " ORDER BY expiration_date DESC"
    . " LIMIT 9";

}

$result_adv = mysqli_query($connect, $sql_adv);

if ($result_adv) {
    $advertisement = mysqli_fetch_all($result_adv, MYSQLI_ASSOC);
}




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