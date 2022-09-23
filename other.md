<h1>TASK-3</h1>

## 1. In current direcory.

## 2. Ping

    ping google.com
        
- 64 bytes from 142.250.186.206 - откуда мы получили 64 байта

- icmp_seq=0 - номер пакета. Он увеличивается с каждым пакетом на 1. Отсутствие номер, означает потеря пакета.

- ttl=113 - время жизни пакета.

- time=123 ms - время в милисекундах, которое было затрачено на получение пакета.      

- Нажатие Ctrl + C заставляет терминал послать сигнал SIGINT процессу, который на данный момент его контролирует.

## 3. curl - нужна для проверки подключения к URL-адресам.

- протокол и код статуса

        HTTP/2 200

- использованный сервер

        server: nginx

- время при выполнении команды

        date: Fri, 23 Sep 2022 07:34:38 GMT

- что получили (текст, кодировка)

        content-type: text/html; charset=UTF-8

- куки, время куки, макс. время жизни, путь, домен и защита.

        set-cookie: klssid=c3dpmvm8rb9f7uskpdd0sbst5p; expires=Fri, 23-Sep-2022 08:04:38 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly


- настройка кэширование

        cache-control: no-store, no-cache, must-revalidate
        pragma: no-cache


        set-cookie: old_ssid=deleted; expires=Thu, 01-Jan-1970 00:00:01 GMT; Max-Age=0; path=/; secure
        set-cookie: is_returning=0; path=/; secure
        alt-svc: h3=":443"; ma=2592000,h3-29=":443"; ma=2592000,h3-Q050=":443"; ma=2592000,h3-Q046=":443"; ma=2592000,h3-Q043=":443"; ma=2592000,quic=":443"; ma=2592000; v="46,43"

 - curl -I

        -I, --head               Show document info only

        