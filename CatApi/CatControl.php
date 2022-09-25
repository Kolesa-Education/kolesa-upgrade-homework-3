<?php
$autoloadPath = __DIR__ . '/vendor/autoload.php';
require_once $autoloadPath;

// добавляем библиотеку к себе в проект
use GuzzleHttp\Client as Client;

class Connect
{
    private $client;

    public function __construct(){
        $this->setConnect();
    }

// Устанавливаем соединение с сайтом 'https://api.thecatapi.com/'
    public function setConnect() {
        $client = new Client([
            'base_uri' => 'https://api.thecatapi.com/',
            'timeout'  => 2.0,
            'verify' => false
        ]);
        $this->client = $client;
    }

// Метод который показывает картинки
    public function getImage($category){
        $response = $this->client->get('v1/images/search?category_ids='. $category);
        $result = json_decode($response->getBody()->getContents(), true);

        if (!array_key_exists(0, $result)) {
            exit("Произошла ошибка!");
        }
        foreach ($result as $id) {
            echo 'id этого котика = ' . $id['id'] . "<br />";
            echo '<img src="'  . $result[0]['url'] . '">' . "<br />";
        }
    }
}

// Проверка на нажатие кнопки, проверка на корректность отправленных данных и если все ок то запуск поиска картинок
if (isset($_POST['submit'])) {
    $cat_category = $_POST['cat_category'];

    if (is_numeric($cat_category)) {
        $obj = new Connect();
        $obj->getImage($cat_category);
        $obj->category = $cat_category;
    } else {
        exit("Введены неверные данные!");
    }
}


