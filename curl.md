Curl это утилита, которая позволяет делать сетевые запросы по разным протоколам (HTTP, FTP, SCP и тд).
Флаг -I позволяют получить заголовок без тела документа, если вы хотите посмотреть, какие заголовки отдает сервер.

При вводе в командную строку команды curl -I https://kolesa.kz/ я получил следующее сообщение

HTTP/1.1 200 OK - (Протокол и код протокола (200 — ОК. Запрос клиента выполнен успешно))
Server: nginx (Сервер сгенерировавшим ответ)
Date: Sat, 24 Sep 2022 11:16:02 GMT - (Время отправки запроса
Content-Type: text/html; charset=UTF-8 (Сообщает о типе полученных данных, а так же о типе кодировки (UTF - 8))
Connection: keep-alive
Set-Cookie: klssid=uh529qn6te1isd05nc8s3o5j2n; expires=Sat, 24-Sep-2022 11:46:02 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly
Expires: Thu, 19 Nov 1981 08:52:00 GMT
Cache-Control: no-store, no-cache, must-revalidate
Pragma: no-cache
Set-Cookie: old_ssid=deleted; expires=Thu, 01-Jan-1970 00:00:01 GMT; Max-Age=0; path=/; secure
Set-Cookie: is_returning=0; path=/; secure
Alt-Svc: h3=":443"; ma=2592000,h3-29=":443"; ma=2592000,h3-Q050=":443"; ma=2592000,h3-Q046=":443"; ma=2592000,h3-Q043=":443"; ma=2592000,quic=":443"; ma=2592000; v="46,43"