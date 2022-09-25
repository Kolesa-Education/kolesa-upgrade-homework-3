# Утилита curl

## Опишите подробно, что выводит команда curl -I https://kolesa.kz/
>HTTP/2 200  
>server: nginx  
>date: Sun, 25 Sep 2022 15:24:39 GMT  
>content-type: text/html; charset=UTF-8  
>set-cookie: klssid=um0leh3du115n6kg0jdnjfltuk; expires=Sun, 25-Sep-2022 15:54:39 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly  
>expires: Thu, 19 Nov 1981 08:52:00 GMT  
>cache-control: no-store, no-cache, must-revalidate  
>pragma: no-cache  
>set-cookie: old_ssid=deleted; expires=Thu, 01-Jan-1970 00:00:01 GMT; Max-Age=0; path=/; secure  
>set-cookie: is_returning=0; path=/; secure  
>alt-svc: h3=":443"; ma=2592000,h3-29=":443"; ma=2592000,h3-Q050=":443"; ma=2592000,h3-Q046=":443"; ma=2592000,h3-Q043=":443"; ma=2592000,quic=":443"; ma=2592000; v="46,43"  

- Что означает флаг "-I"? - флаг "-I" дает задание утилите curl вывести только заголовки HTTP, и полностью прогноировать содержимое тела страницы
- HTTP/2 200 - ответ web server, 200 - ощначает ОК - запрос обработан успешно
- server: nginx - имя программы выстапющей в качестве веб-сервера, данная информация может быть скрыта
- date: Sun, 25 Sep 2022 15:24:39 GMT - локальное время запроса
- set-cookie: klssid=um0leh3du115n6kg0jdnjfltuk; expires=Sun, 25-Sep-2022 15:54:39 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly - задание куки, время ее истечения, макс. возможное время жизни, путь для котрого эта кука актуальна
- далее идут дополнительные настройки для кук