<?php

class FetchData
{
    private $data;
    public $error;
    public $response;

    public function __construct($url)
    {
        $fetchedData = @file_get_contents($url);
        if ($fetchedData) {
            $this->data = json_decode($fetchedData);
            $this->response = $this->data[0];
        } else {
            $this->error = true;
            $this->response = 'HTTP Request failed! Check your URL';
        }
    }
}
