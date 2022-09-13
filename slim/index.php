<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . ' ./vendor/autoload.php';

$app = AppFactory::create();

//GET  /
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Vai jacaré jacaré!</br>GET sem rota, entrem em locallhost:8000/oi/[seu nome]");
    return $response;
});


//GET /oi
$app->get('/oi', function (Request $request, Response $response) {
    $response->getBody()->write("Digite locallhost:8000/oi/[seu nome] para ser mais legal");
    return $response;
});

//GET /oi/arg
$app->get('/oi/{nome}', function (Request $request, Response $response, array $args) {
    $nome = $args['nome'];

    $response->getBody()->write("olá, $nome</br>Utilizando metódo GET");
    return $response;
});

$app->run();

?>