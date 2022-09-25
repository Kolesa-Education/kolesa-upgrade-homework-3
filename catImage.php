<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

class catImage{

    private $client;

    function newClient(){
        $client = new Client([
            'base_uri' => 'https://api.thecatapi.com',
            'timeout'  => 2.0,
        ]);
        $this->client = $client;
    }
        
    function getCategory(){
        try {
            echo  "<h5>Выберите категорию:</h5>";
        
            $response = $this->client->request('GET', '/v1/categories');
            $contents = $response->getBody()->getContents();
            $jsonContent = json_decode($contents, true);
        
            foreach ($jsonContent as $jsonCategory) {
                echo  "<a href='/index.php?category_ids=" . $jsonCategory['id'] . "'>" . $jsonCategory['name'] . "</a><br>";
            }
            echo  "<a href='/index.php"."'>random cat</a><br>";
        } catch (GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getStatusCode() . " " . $e->getResponse()->getReasonPhrase();
        } catch (GuzzleHttp\Exception\ServerException $e) {
            printf("Ошибка сервера: %s", $e->getMessage());
        } catch (\Exception $e) {
            printf("Ошибка: %s", $e->getMessage());
        }
    }
    
    public function getImage()
    {
        $category = $_GET['category_ids']??null;
        try {
            if (!isset($category)) {
                $response = $this->client->request('GET', '/v1/images/search');
            } else {
                $category = $_GET['category_ids'];
                $response = $this->client->request('GET', '/v1/images/search?category_ids=' . $category);
            }
        
            $contents = $response->getBody()->getContents();
            $jsonContent = json_decode($contents, true);
            $url = $jsonContent[0]['url'];
        
            echo '<img src=' . $url . ' alt="random_cat" style="max-width:300px; max-height:300px">';
        
        } catch (GuzzleHttp\Exception\ClientException $e) {
            echo $e->getResponse()->getStatusCode() . " " . $e->getResponse()->getReasonPhrase();
        } catch (GuzzleHttp\Exception\ServerException $e) {
            printf("Ошибка сервера: %s", $e->getMessage());
        } catch (\Exception $e) {
            printf("Ошибка: %s", $e->getMessage());
        }
    }
    
}


