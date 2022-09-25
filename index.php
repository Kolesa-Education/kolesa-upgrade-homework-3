<?php

require_once 'classes/FetchData.php';
require_once 'classes/ShowPicture.php';

$fetchData = new FetchData('https://api.thecatapi.com/v1/images/search');
if (!$fetchData->error) {
    $pic = new ShowPicture($fetchData->response);
    echo $pic->renderHtmlPicture();
} else {
    echo $fetchData->response;
}
