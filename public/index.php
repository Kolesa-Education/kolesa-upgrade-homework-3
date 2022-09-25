<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use App\CatApiClient;
use DI\Container;

$container = new Container();
$container->set('renderer', function () {
    return new \Slim\Views\PhpRenderer(__DIR__ . '/../resources/templates');
});
$container->set('catapi', function () {
    return new  CatApiClient();
});

$app = AppFactory::createFromContainer($container);
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $imgUrl = $this->get('catapi')->getUrlRandCatImg();
    $categories =$this->get('catapi')->getCategoryCatsImg();
    $params = [
        'url' => $imgUrl,
        'categories' => $categories
    ];

    return $this->get('renderer')->render($response, 'index.phtml', $params);
});

$app->get('/{categoryId}', function (Request $request, Response $response, array $args) {
    $categoryId = $args['categoryId'];
    $imgUrl = $this->get('catapi')->getCatImgByCategory($categoryId);
    $categories = $this->get('catapi')->getCategoryCatsImg();
    $params = [
        'url' => $imgUrl,
        'categories' => $categories
    ];

    return $this->get('renderer')->render($response, 'index.phtml', $params);
});

$app->run();
