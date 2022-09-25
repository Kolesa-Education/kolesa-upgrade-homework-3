# Изучение утилиты ping

### Задание
```bash
Если в терминал введем ping google.com
Он нам выдаст: 
Обмен пакетами с google.com [142.251.1.139] с 32 байтами данных:
Ответ от 142.251.1.139: число байт=32 время=624мс TTL=103
Ответ от 142.251.1.139: число байт=32 время=121мс TTL=103
Ответ от 142.251.1.139: число байт=32 время=1803мс TTL=103
Ответ от 142.251.1.139: число байт=32 время=942мс TTL=103

Статистика Ping для 142.251.1.139:
    Пакетов: отправлено = 4, получено = 4, потеряно = 0
    (0% потерь)
Приблизительное время приема-передачи в мс:
    Минимальное = 121мсек, Максимальное = 1803 мсек, Среднее = 872 мсек
```

### PING
```bash
- PING является простым и удобным средством опроса узла по имени или его IP-адресу
ping google.com - это эхо-запрос к узлу с именем google.com с параметрами по умолчанию - количество пакетов равно 4, длина массива данных = 32 байта.
```
### Решение
```bash
Какую информацию предоставляет нам это команда:

- IP-адрес компьютера, с кем осуществляется проверка связи;
- Число отправленных байт – по умолчанию 32 байта;
- Время отклика сервера в мс – вот это самый основной параметр, на который нужно обратить максимальное внимание;
- Количество промежуточных устройств в сети, через которые пакет должен пройти, по-другому называют «время жизни пакета» - Time to live (TTL).
- Дальше выдалась статистика Ping для IP-адреса:
    -Сколько пакетов отправлено, получено, потеряно
    -И приблизительное время приема-передачи в мс
```


### Показатель время отклика сервера
```bash
Значения времени отклика (см скрин ниже - среднее значение 33 мс):

До 40 мс — идеальное значение. Такое время реакции позволяет комфортно пользоваться стримминговыми сервисами;
От 40 — 110 мс считается нормальным значением. Пинг позволяет комфортно пользоваться интернет-серфингом и онлайн-игр;
Если пинг больше 110 — 210 мс, то медиасервисы будут работать медленно.
```


# Изучение утилиты curl

### Задание 

```bash
    curl -I https://kolesa.kz/ эта команда выведет:
HTTP/1.1 200 OK
Server: nginx
Date: Sat, 24 Sep 2022 15:36:44 GMT
Content-Type: text/html; charset=UTF-8
Connection: keep-alive
Set-Cookie: klssid=tuaggk9h6q2uful6a5dlgpajs2; expires=Sat, 24-Sep-2022 16:06:44 GMT; Max-Age=1800; path=/; domain=.kolesa.kz; secure; HttpOnly
Expires: Thu, 19 Nov 1981 08:52:00 GMT
Cache-Control: no-store, no-cache, must-revalidate
Pragma: no-cache
Set-Cookie: old_ssid=deleted; expires=Thu, 01-Jan-1970 00:00:01 GMT; Max-Age=0; path=/; secure
Set-Cookie: is_returning=0; path=/; secure
Alt-Svc: h3=":443"; ma=2592000,h3-29=":443"; ma=2592000,h3-Q050=":443"; ma=2592000,h3-Q046=":443"; ma=2592000,h3-Q043=":443"; ma=2592000,quic=":443"; ma=2592000; v="46,43"
```

### Решение

```bash
Этот флаг означает - печатать заголовок без тела документа. То есть, что мы хотим получить заголовки ответа HTTP в выводе после отправки этой команды curl. 
HTTP/1.1 200 OK 
- Актуальная на данный момент версия протокала
- И статус 200 Ок, значит все хорошо и все работает
Server: nginx
- То есть сервер в колеса на nginx. Nginx это программное обеспечение с открытым исходным кодом для создания легкого и мощного веб-сервера. Также его используют в качестве почтового или обратного прокси-сервера. 
- Дальше небольшие информации о дате, connection, cookie и т.д.
```

```bash
Cookies — это небольшие текстовые файлы у нас на компьютерах, в которых хранится информация о наших предыдущих действиях на сайтах. Кроме входов в аккаунты они умеют запоминать:

-предпочтения пользователей, например, язык, валюту или размер шрифта.
-товары, которые мы просматривали или добавили в корзину;
-текст, который мы вводили на сайте раньше;
-IP-адрес и местоположение пользователя;
-дату и время посещения сайта;
-версию ОС и браузера;
-клики и переходы.
```