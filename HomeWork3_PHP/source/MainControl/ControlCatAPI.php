<?php



require_once __DIR__ . '/../../vendor/autoload.php';


use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Client;

require_once __DIR__ . '/../Classes/CatImage.php';
require_once __DIR__ . '/IControlAPI.php';



  class ControlCatApi implements IControlAPI{
    protected string $m_baseUrl;
    protected $m_imageCategory;
    protected CatImage $m_catImage;
    protected Client $m_client;

    public function __construct($baseUrl){
      $this->m_baseUrl=$baseUrl;
      $this->m_client=new Client([
          'timeout'  => 2.0,
          'base_uri' => "$baseUrl"
      ]);
      $this->m_catImage = new CatImage(0,"",0,0);

    }

    public function getImageCategory(){
      return $this->m_imageCategory;
    }
    public function setImageCategory($imageCategory){
      $this->m_imageCategory=$imageCategory;
    }


    public function getBaseUrl():string{
      return $this->m_baseUrl;
    }
    public function setBaseUrl(string $url){
      $this->m_baseUrl=$url;
    }



      private function getCat($response){

        $img= new CatImage(0,"",0,0);
        $decoded =$this->decodeBody($response);

        foreach ($decoded as $value) {
          $id=$value->id;
          $url = $value->url;
          $width= $value->width;
          $height= $value->height;

          $img->setCat($id,$height,$width,$url);

        }
        return $img;


      }

    private function decodeBody($resp){

      $body = $resp->getBody();
      $decoded =json_decode($body);
      return $decoded;

    }


    private function getCategoryByID($id){

      try{
        $response = $this->m_client->request('GET', "categories",['verify' => false]);
        $categoryList=$this->decodeBody($response);

        foreach ($categoryList as  $value) {
          if($value->id==$id){
              return $value;
          }
        }

        return null;

      }
      catch (ClientException $e) {

         $response = $e->getResponse();
         $message= $this->decodeBody($response);

         echo $message->message;
         throw new \Exception("Error Processing Request", 1);

      }

    }





    public function setRandomCatByCategory(int $categoryID){


      try {
        $this->setImageCategory($this->getCategoryByID($categoryID));

        if($this->getImageCategory()!==null){

          $response = $this->m_client->request('GET', "images/search?category_ids=$categoryID",['verify' => false]);

          $cat = $this->getCat($response);
          $this->m_catImage->setCat($cat->getId(),$cat->getHeight(),$cat->getWidth(),$cat->getUrl());

        }
        else{
          echo("Такой категории еще не существует");
          throw new \Exception("Error Processing Request", 1);

        }
      }
      catch (ClientException $e) {

        $response = $e->getResponse();
        $message= $this->decodeBody($response);

        echo $message->message;
        throw new \Exception("Error Processing Request", 1);


      }


    }

    public function printCat(){
      $category=$this->getImageCategory();
      echo "Название Вашей  Категории:" . $category->name . "<br>";
      $this->m_catImage->printImage();
    }









  }
