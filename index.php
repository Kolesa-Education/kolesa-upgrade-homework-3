<?php

class Fetch
{

    public $fetched;
    public $error;

    public function __construct($url)
    {
        if (strlen($url) > 10) {
            if ($fetch = @file_get_contents($url)) {
                $toJson = json_decode($fetch, true);
                $toJson = $toJson[0];
                $this->fetched = $toJson;
                return $toJson;
            } else {
                $this->error = 'No data to be found';
            }
        } else {
            $this->error = 'Wrong url address';
        }
    }

    public function render()
    {
        if (!$this->error) {
            return "<img width='" . $this->fetched['width'] . "' height='" . $this->fetched['height'] . "' src='" . $this->fetched['url'] . "'>";
        } else {
            return $this->error;
        }
    }

}

$fetch = new Fetch('https://api.thecatapi.com/v1/images/search');
echo $fetch->render();
