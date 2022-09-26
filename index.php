<?php
class Cat
{
    protected $fetchBreeds;
    protected $getBreed;

    public function __construct($fetchBreeds, $getBreed)
    {
        $this->setFetchBreeds($fetchBreeds);
        $this->getBreed = $getBreed;
    }
    /**
     * @param mixed $fetchBreeds
     */
    public function setFetchBreeds($fetchBreeds)
    {
        $this->fetchBreeds = json_decode(file_get_contents($fetchBreeds), true);
    }

    public function eachIMG(){
        for ($i = 0; $i < count($this->fetchBreeds); $i++) {
            if ($this->fetchBreeds[$i]['name'] == $this->getBreed) {
                return '<img width="400px" height="auto" src="'.$this->fetchBreeds[$i]['image']['url'].'">';
            }
        }
        return null;
    }

    public function eachId()
    {
        for ($i = 0; $i < count($this->fetchBreeds); $i++) {
            echo '<option value="'.$this->fetchBreeds[$i]['name'].'">'.$this->fetchBreeds[$i]['name'].'</oprion>';
        }
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Это заголовок тайтл</title>
</head>
<body>
<form action="" method="get">
    <?php

    $cat = new Cat('https://api.thecatapi.com/v1/breeds/', isset($_GET['paroda']) ? $_GET['paroda'] : null);

    if (isset($_GET['submit'])) {
        echo $cat->eachIMG();
    }
    ?>
    <select name="paroda" id="paroda">
        <option value="change">change</option>
        <?php $cat->eachId(); ?>
    </select>
    <button type="submit" name="submit" value="submit">Submit</button>

</form>

</body>
</html>
// Вопрос - Объясните своими словами, для чего нужна эта утилита. Опишите подробно, что выводит команда ping google.com.
// Ответ - Ping - нужна для проверки подключения к другому компьютеру на уровне ip.Команда ping 'ip' отправляет серию пакетов на указанную ip и выдает на время ответа.
    // Вопрос - В частности, напишите, что означают строчки "64 bytes from 142.250.186.206", "icmp_seq=0", "ttl=113", "time=123 ms". Расскажите, что выводит программа при завершении работы (после нажатия ctrl+c).
    // Ответ - 64 bytes - вес пакетов,
    // from 142.250.186.206 - адресс для обмена данных,
    // icmp_seq=0 - предназначен для отправки контрольных и тестовых сообщений по IP-сетям, а 0 это тип соббщений 0 = Эхо-ответ.
    // ttl=113 - это кол-во промежуточных устройст который он проходит дальше он теряется.
    // time=123 ms - затраченное время в миллисекундах для формулировки пакета.
    // При нажатии нажатия ctrl+c во время работы команды ping - операция прерывается и сразу выводится информация с уже сформулированными пакетами.