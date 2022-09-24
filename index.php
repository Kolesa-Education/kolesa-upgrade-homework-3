

<?php

require_once ('vendor/autoload.php');
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

$requestedCategory = $_GET['category'] ?? 'all';

//Выполняет GET запрос
function executeGETRequest(string $url)
{
    try {$client = new Client([
            'base_uri' => $url,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET');
        return json_decode($response->getBody(), false);
    } catch (ClientException $e) {
        echo $e->getCode();
        //die();
    }
}

//Возвращает URL изображения
function getCat($id): string
{
    try {
        if ($id == "all"){
            return executeGETRequest('https://api.thecatapi.com/v1/images/searchh')[0]->url;
        } else {
            return executeGETRequest("https://api.thecatapi.com/v1/images/search?category_ids=" . $id)[0]->url;
        }
    } catch (Throwable $e){
        echo $e->getMessage();
    }
    return '';
}

?>

<html>
<body>
<form method="get">
    <select name="category">
        <option value="all">All</option>
        <?php
        //Заполняет список категориями
        $categories = executeGETRequest('https://api.thecatapi.com/v1/categories');
        foreach ($categories as $category){
            echo "<option value=\"" . $category->id . "\"";
            //Запоминает выбранный в списке вариант
            if ($category->id == $requestedCategory){
                echo " selected=\"selected\"";
            }
            echo ">" . $category->name . "</option>";
        }
        ?>
    </select>
    <button type="submit">GET</button>
</form>
<img src="<?php echo getCat($requestedCategory) ?>" width="500" height="600"/>
</body>
</html>