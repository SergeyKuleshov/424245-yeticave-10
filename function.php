<?php

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