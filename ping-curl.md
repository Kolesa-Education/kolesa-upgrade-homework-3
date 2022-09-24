# Ping

ping google.com
Это команда дает информацию о запросе на сервер google.com

64 bytes from 142.250.186.206 - откуда мы получили 64 байта, с какого ip адреса

icmp_seq=0 - индекс пакета. Оно с каждым разом увеличивается на один.

ttl=113 - Time to live (TTL), это количество промежуточных устройств в сети, через которых пакет проходит.

time=123 ms - время отклика сервера в мс, то есть за какое количество времени пакет был получен.

--- google.com ping statistics ---
6 packets transmitted, 5 received, 16.6667% packet loss, time 4996ms

После прерывания сигнала дается статистическая информация о пакетах: сколько отправлено, получено, сколько процентов потеряно, сколько времени на все потрачено.

# Curl

curl -I https://kolesa.kz/

Это команда используется для передачи данных с сервера или в сервер.
Опция -I используется для того, чтобы получить заголовок HTTP без содержимого страницы. 
Если ввести текст без опций, то программа просто отобразит содержимое веб-страницы в виде исходного кода. 


HTTP/2 200 
server: nginx
date: Sat, 24 Sep 2022 08:54:57 GMT
content-type: text/html; charset=UTF-8
set-cookie: klssid=iadrvtmlqsls8bnf2n9s9j9buj; expires=Sat, 24-Sep-2022 09:24:57 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly
expires: Thu, 19 Nov 1981 08:52:00 GMT
cache-control: no-store, no-cache, must-revalidate
pragma: no-cache
set-cookie: old_ssid=deleted; expires=Thu, 01-Jan-1970 00:00:01 GMT; Max-Age=0; path=/; secure
set-cookie: is_returning=0; path=/; secure
alt-svc: h3=":443"; ma=2592000,h3-29=":443"; ma=2592000,h3-Q050=":443"; ma=2592000,h3-Q046=":443"; ma=2592000,h3-Q043=":443"; ma=2592000,quic=":443"; ma=2592000; v="46,43"


HTTP/2 200 
- протокол и статус код запроса. Статус 200 означает, что все в порядке. 

server: nginx 
- какой сервер использовался

date: Sat, 24 Sep 2022 08:54:57 GMT 
- время отправки запроса

content-type: text/html; charset=UTF-8 
- какой ответ от сервера получили: тип, кодировка

set-cookie: klssid=iadrvtmlqsls8bnf2n9s9j9buj; expires=Sat, 24-Sep-2022 09:24:57 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly
expires: Thu, 19 Nov 1981 08:52:00 GMT
- информация о куки: продолжительность "жизни", путь, домен

