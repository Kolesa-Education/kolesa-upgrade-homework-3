<?php

require_once ('vendor/autoload.php');
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$requestedCategory = $_GET['category'] ?? 'all';
$error = 0;


//Выполняет GET запрос
function executeGETRequest(string $url)
{
    try {$client = new Client([
        'base_uri' => $url,
        'timeout'  => 2.0,
    ]);
        $response = $client->request('GET');
        return json_decode($response->getBody(), false);
    } catch (Exception $e) {
        throw $e;
    }
}

//Возвращает URL изображения
function getCat($id): string
{
    global $error;
    try {
        if ($id == "all"){
            return executeGETRequest('https://api.thecatapi.com/v1/images/search')[0]->url;
        } else {
            return executeGETRequest("https://api.thecatapi.com/v1/images/search?category_ids=" . $id)[0]->url;
        }
    } catch (Throwable $e){
        global $error;
        $error = $e->getMessage();
    }
    return '';
}

//Заполняет список категориями
function getCategories() {
    try {
        $categories = executeGETRequest('https://api.thecatapi.com/v1/categories');
        foreach ($categories as $category){
            echo "<option value=\"" . $category->id . "\"";
            //Запоминает выбранный в списке вариант
            global $requestedCategory;
            if ($category->id == $requestedCategory){
                echo " selected=\"selected\"";
            }
            echo ">" . $category->name . "</option>";
        }
    } catch (Throwable $e){
        global $error;
        $error = $e->getMessage();
        return;
    }
}
?>