<?php

function dd($data) {
    echo "<pre>";
    var_dump($data);
    echo "<pre>";
    exits;
}

function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

function currency_format($number, $suffix = 'đ') {
    if(!empty($number)) {
        return number_format($number, 0, '.', ',') . "{$suffix}";
    }
}
?>