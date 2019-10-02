<?php


require_once('function.php');
require_once('helpers.php');
require_once('init.php');


$sql_cat = "SELECT title, char_code FROM categories";
$result = mysqli_query($connect, $sql_cat);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql_adv = "SELECT l.title, c.title category, start_price, offer_price price, picture_path url_picture, l.dt_add expiration_date FROM lots l"
    . " JOIN categories c ON l.cat_id = c.id"
    . " LEFT JOIN bids b ON l.id = b.lot_id"
    . " WHERE l.dt_add >= NOW()"
    . " ORDER BY expiration_date DESC"
    . " LIMIT 9";

$result_adv = mysqli_query($connect, $sql_adv);
$advertisement = mysqli_fetch_all($result_adv, MYSQLI_ASSOC);


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