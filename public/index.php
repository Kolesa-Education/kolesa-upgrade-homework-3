<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\CatApiClient;
use \Slim\Views\PhpRenderer;

$templateRender = new PhpRenderer(__DIR__ . '/../resources/templates');
$catApiClient = new CatApiClient();

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) use ($catApiClient, $templateRender) {
    $imgUrl = $catApiClient->getURLRandImage();
    $categories =$catApiClient->getImageCategories();
    $params = [
        'url' => $imgUrl,
        'categories' => $categories
    ];

    return $templateRender->render($response, 'index.phtml', $params);
});

$app->get('/{categoryID}', function (Request $request, Response $response, array $args) use ($catApiClient, $templateRender) {
    $categoryID = $args['categoryID'];
    $imgUrl = $catApiClient->getURLImageByCategory($categoryID);
    $categories = $catApiClient->getImageCategories();
    $params = [
        'url' => $imgUrl,
        'categories' => $categories,
        'categoryID' => $categoryID
    ];

    return $templateRender->render($response, 'index.phtml', $params);
});

$app->run();
