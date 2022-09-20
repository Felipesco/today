<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . ' ./vendor/autoload.php';
require_once __DIR__ . './model/ConexaoDB.php';

$app = AppFactory::create();

//GET  /
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Lista metodo GET: </br>locallhost:8000/oi/[seu nome]</br>locallhost:8000/oi/[seu nome]");
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


//GET /contatos
$app->get('/contatos', function (Request $request, Response $response, $args) {

    $sql = "SELECT * FROM contato";
    $contatos = array();
    
    $resultado = ConexaoDB::getInstance()->getHandler()->query($sql);

    while ($linha = $resultado->fetch_assoc()){
        $contatos[] = $linha; 
    }

    $response->getBody()->write(json_encode($contatos));
    return $response -> withHeader('Contebt-type', 'application/json');

});


//GET /contatos/[id]
$app->get('/contatos', function (Request $request, Response $response, $args) {

    $id = $request->getAttribute('id');


    $sql = "SELECT * FROM contato WHERE id = $id";
    $contatos = array();
    
    $resultado = ConexaoDB::getInstance()->getHandler()->query($sql);

    while ($linha = $resultado->fetch_assoc()){
        $contatos[] = $linha; 
    }

    $response->getBody()->write(json_encode($contatos[0]));
    return $response -> withHeader('Contebt-type', 'application/json');

});


// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

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