<?php

require_once ('vendor/autoload.php');
use GuzzleHttp\Client;

$catApi = new CatApi();
$catApi->getData();

class catApi
{
    protected $requestedCategory;
    protected $categories;
    protected $catImg;
    public function getData(){
        $this->requestedCategory = $_GET['category'] ?? 'all';
        try {
            $this->categories = $this->executeGETRequest('https://api.thecatapi.com/v1/categories');
            if ($this->requestedCategory == "all"){
                $this->catImg = $this->executeGETRequest('https://api.thecatapi.com/v1/images/search')[0]->url;
            } else {
                $this->catImg =  $this->executeGETRequest("https://api.thecatapi.com/v1/images/search?category_ids=" .
                    $this->requestedCategory)[0]->url;
            }
            include ('index.php');
        } catch (Exception $e){
            include ('ErrorPage.php');
        }
    }

    //Выполняет GET запрос
    protected function executeGETRequest(string $url)
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


    //Заполняет список категориями
    function fillHTMLCategories() {
            foreach ($this->categories as $category){
                echo "<option value=\"" . $category->id . "\"";
                //Запоминает выбранный в списке вариант
                if ($category->id == $this->requestedCategory){
                    echo " selected=\"selected\"";
                }
                echo ">" . $category->name . "</option>";
            }
    }

}