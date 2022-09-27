<?php

class Service
{
    private $client;
    private $category;

    public function __construct($client, $category) {
        $this->client = $client;
        $this->category = $category;
    }

    public function getCategories(): void
    {
        $response = $this->client->get(uri: 'v1/categories');
        $array = json_decode($response->getBody()->getContents(), associative: true);
        asort($array);
        foreach ($array as $category) {
            echo '<tr> <th> <a href="index.php?category_ids=' . $category["id"] . '">' . $category["id"] . '</a> </th> <th> <a href="index.php?category_ids=' . $category["id"] . '">' . $category["name"] . '</a> </th> </tr> ' . PHP_EOL;
        }
    }

    public function getCategoryName($category): void
    {
        $this->category = $category;
        $response = $this->client->get(uri: 'v1/categories');
        $array = json_decode($response->getBody()->getContents(), associative: true);
        asort($array);
        if (!isset($category)) {
            echo '<h2>Current category is not choosen.<h2>' . PHP_EOL;
        }
        foreach ($array as $element) {
            if ($category == $element["id"]) {
                echo '<h2>Current category name is "' . $element["name"] . '".<h2>' . PHP_EOL;
            }
        }
    }

    public function getPicture($category): void
    {
        if (!isset($category)) {
            $additionalAddress = 'v1/images/search';
        } else {
            $additionalAddress = 'v1/images/search?category_ids=' . $category;
        }
        try {
            $response = $this->client->get(uri: $additionalAddress);
            $array = json_decode($response->getBody()->getContents(), true);
            if (empty($array)) {
                echo "<h1>Error! Incorrect category has been choosing, try another one.<h1>";
            } else {
                echo '<img src="' . $array[0]['url'] . '"/>';
            }
        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}