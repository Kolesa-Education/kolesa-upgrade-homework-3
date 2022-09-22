<?php

function template($__view, $__data)
{
    extract($__data); # Превращаем параметры в переменные

    ob_start(); # Начало буферизации

    require_once $__view; # Импорт файла

    $output = ob_get_clean(); # Получение данных из буфера и его очистка

    return $output;
}
