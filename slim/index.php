<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . ' ./vendor/autoload.php';
require_once __DIR__ . './model/ConexaoDB.php';

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

// POST /teste
$app->post('/teste', function (Request $request, Response $response, $args) {

    $dados = file_get_contents('php://input');

    $array = json_decode($dados);
    $nome = $array  ->nome;

    $response->getBody()->write("Heeee, inserção de dados</br>Metodo POST - Inseirir item $nome");

    return $response;

});


// PUT /alter/id
$app->put('/alter/{id}', function (Request $request, Response $response, $args) {

    $id = $args['id'];

    $response->getBody()->write(":) alteração de de dados</br>PUT - Atualizar item com o id:  $id");

    return $response;

});


// DELETE /del/id
$app->delete('/del/{id}', function (Request $request, Response $response, $args) {

    $id = $args['id'];

    $response->getBody()->write("Delete - Deletar item com o id: $id");

    return $response;

});


$app->run();

?>