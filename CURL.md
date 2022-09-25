curl - комманда, позволяющая выполнять запросы с различными параметрами 
и методами через разные сетевые протоколы. curl дает в виде текста то, 
что мы можем получить написав адрес в браузере. 

curl -I https://kolesa.kz/ --> команда делает HTTP запрос на https://kolesa.kz/
Флаг -I дает дополнительную информацию, как HTTP headers.   

HTTP/1.1 200 OK -> код ответа 200, запрос прошел успешно
server: nginx -> название сервера
date: Tue, 13 Sep 2022 05:04:05 GMT -> дата документа
Content-Type: text/html; charset=UTF-8 -> обозначает charset, набор символов, которые могут 
использоваться конкретным устройством
Connection: keep-alive -> указывает шаблон подключения: keep-alive шаблон связи между сервером 
и клиентом, чтобы последующие запросы или ответы оставались открытыми.
Set-Cookie: klssid=9d9istlahr8c0mkn0go0fnrpjn; expires=Sun, 25-Sep-2022 15:43:59 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly
Expires: Thu, 19 Nov 1981 08:52:00 GMT -> отправляет cookies с сервера на агент пользователя и задает скок годности.
Cache-Control: no-store, no-cache, must-revalidate -> контролируют кеширование в браузерах и общие кеши