<?php

function template($path, $data)
{
    extract($data); # Превращаем параметры в переменные

    ob_start(); # Начало буферизации

    require_once $path; # Импорт файла

    $output = ob_get_clean(); # Получение данных из буфера и его очистка

    return $output;
}
