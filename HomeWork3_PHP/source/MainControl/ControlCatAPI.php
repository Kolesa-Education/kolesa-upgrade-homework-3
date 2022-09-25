<?php



require_once __DIR__ . '/../../vendor/autoload.php';


use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;

require_once __DIR__ . '/../Classes/CatImage.php';
require_once __DIR__ . '/IControlAPI.php';


  class ControlCatApi implements IControlAPI{
    protected string $mBaseUrl;
    protected Client $mClient;

    public function __construct($baseUrl){
      $this->mBaseUrl=$baseUrl;
      $this->mClient=new Client([
          'timeout'  => 2.0,
          'base_uri' => "$baseUrl"
      ]);
    }

    public function getBaseUrl():string{
      return $this->mBaseUrl;
    }
    public function setBaseUrl(string $url){
      $this->mBaseUrl=$url;
    }

    private function decodeBody($resp){

      $body = $resp->getBody();
      $decoded =json_decode($body);
      return $decoded;

    }

    private function getCategoryByID($id){

      try{
        $response = $this->mClient->request('GET', "categories",['verify' => false]);
        $categoryList=$this->decodeBody($response);

        foreach ($categoryList as  $value) {
          if($value->id==$id){
            return $value;
          }
         }

        echo("Категория не была найдена");
        throw new \Exception("Error Processing Request", 1);


      }

      catch (ClientException $e) {

        echo("Проблема с отправкой запроса на сервер.");
        throw new \Exception("Error Processing Request", 1);

      }

    }




    private function getCat($response,$categoryID){

      $img= new CatImage(0,"",0,0,"");

      $decoded =$this->decodeBody($response);

      foreach ($decoded as $value) {
        $id=$value->id;
        $url = $value->url;
        $width= $value->width;
        $height= $value->height;
        $category = $this->getCategoryByID($categoryID);

        $img->setCat($id,$height,$width,$url,$category);
      }

      return $img;

    }

    public function printRandomCatByCategory(int $categoryID){


      try {

          $response = $this->mClient->request('GET', "images/search?category_ids=$categoryID",['verify' => false]);

          $cat = $this->getCat($response,$categoryID);

          $cat->printImage();

      }
      catch (ClientException $e) {

        echo("Проблема обработки запроса");
        throw new \Exception("Error Processing Request", 1);

      }
    }












    public function printCat(){
      $category=$this->getImageCategory();
      echo "Название Вашей  Категории:" . $category->name . "<br>";
      $this->m_catImage->printImage();
    }

  }
