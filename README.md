# kolesa-upgrade-homework-3

Дедлайн: 25.09 воскресенье 23:59

Домашнее задание состоит из 3 частей:

### 1. Практическая работа.

Современные проекты часто состоят из множества веб-сервисов, взаимодействующих друг с другом по HTTP.
Мы потренируемся в создании сервиса, который должен обращаться к стороннему API thecatapi.com, получать от него ссылки на фотографии котов, и генерировать на их основе веб-страницу.

Пример итоговой веб-страницы:
```
<html>
  <body>
    <img src="ссылка-на-случайное-фото-кота"/>
  </body>
</html>
```
(оформление страницы остаётся на ваше усмотрение)

Документацию сервиса можно изучить здесь: https://docs.thecatapi.com/
Подсказка: нас интересует метод API https://api.thecatapi.com/v1/images/search

Для успешного выполнения задания вам понадобится:
* понимание протокола HTTP
* знакомство с форматом JSON
* базовые знания PHP и HTML
    * для выполнения HTTP-запросов на PHP вам могут пригодиться функции `file_get_contents`, `curl_exec`, или библиотека Guzzle 
    * мы рекомендуем использовать библиотеку Guzzle; чтобы подключить её в проект, вам понадобится освоить работу с пакетным менеджером composer

Мы ожидаем, что сервис будет написан на PHP. Однако если вы уверенно чувствуете себя с языком Go, то можете использовать его.

##### Дополнительные (опциональные) требования:
* Подумайте о том, какие ошибки могут произойти при взаимодействии сервисов и как их можно обработать. Что, если thecatapi недоступен? Что будет, если указать некорректный URL? Как лучше сообщить о проблеме пользователю?
* Попробуйте усложнить сервис: выводить котов только из заданной категории https://docs.thecatapi.com/api-reference/categories/categories-list (id категории можно получать из запроса пользователя)

### 2. Изучение утилиты `ping`.

Объясните своими словами, для чего нужна эта утилита. Опишите подробно, что выводит команда `ping google.com`.

В частности, напишите, что означают строчки "64 bytes from 142.250.186.206", "icmp_seq=0",  "ttl=113", "time=123 ms".

##### Ответ на задание 2

1. 64 bytes - Число отправленных байт
2. hem08s06-in-f14.1e100.net (142.250.186.206) IP-адрес компьютера, с кем осуществляется проверка связи ( в данном случае google.com) 142.250.186.206 - это также IP адрес Google cloud .
3. icmp_seq=0 — номер пакета. Это значение должно последовательно увеличиваться на 1. Если какой-либо номер отсутствует, то это означает, что пакет потерялся в Интернете и не дошел до адресата или ответ не вернулся. Это может быть из-за неустойчивой работы оборудования, плохого кабельного соединения или один из маршрутизаторов в сети между компьютерами выбрал неправильный путь, и пакет не достиг места назначения;
4. ttl=113 — время жизни пакета. При отправке пакета ему отводится определенное время жизни, которое задается числом. По умолчанию в большинстве систем равно 64, но значение может быть изменено. Каждый маршрутизатор при передаче пакета уменьшает это число. Когда оно становится равным нулю, пакет считается заблудившимся и уничтожается. Таким образом, по этому значению можно приблизительно сказать, сколько маршрутизаторов встретилось на пути;
5. time=123 ms - время, затраченное на ожидание ответа. По этому параметру можно судить о скорости связи и о ее стабильности, если значение параметра не сильно изменяется от пакета к пакету.

Расскажите, что выводит программа при завершении работы (после нажатия ctrl+c).

После нажатия ctrl+c мы видим небольшую статистику обмена сообщениями: количество отправленных, полученных и потерянных пакетов, а также минимальное, среднее и максимальное время обмена пакетами

### 3. Изучение утилиты `curl`.

Объясните своими словами, для чего нужна эта утилита. Опишите подробно, что выводит команда `curl -I https://kolesa.kz/`

В частности, напишите, что означают строки `HTTP/2 200`, `server: nginx` и другие. Что означает флаг `-I`?

Если вы работаете на windows, то сначала нужно будет установить программу curl; инструкции есть в интернете.

Задания 2 и 3 можно включить в pull request в виде текстового документа в формате txt или md.

Для выполнения заданий вам придётся самостоятельно найти в интернете нужную информацию, которой не было в лекции. Это нормально: программистам в своей работе постоянно требуется изучать что-то новое.


##### Ответ на задание 3

    curl является сокращением от Client URL (клиентский URL). Это бесплатная утилита, которая позволяет взаимодействовать с множеством различных серверов по множеству различных протоколов с синтаксисом URL через командную строку. Оно также включает в себя библиотеку libcurl (библиотека API для взаимообмена данными), которую можно встраивать в другие приложения.
    Команда curl -I https://kolesa.kz/ выводит заголовок HTTP без тела документа.
    HTTP/2 200: HTTP/2  - протокол.
    Код 200 означает, что запрос был успешным.
    Server: nginx: описывает программное обеспечение, используемое исходным сервером, обработавшим запрос, то есть сервером, сгенерировавшим ответ.
    Content-Type сообщает информацию о типе передаваемого контента
    Флаг -I - опция  получает только HTTP заголовок без тела документа
