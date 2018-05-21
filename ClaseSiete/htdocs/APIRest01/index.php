<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
//require_once '/clases/AccesoDatos.php';
//require_once '/clases/cd.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

//*********************************************************************************************//
//INICIALIZO EL APIREST
//*********************************************************************************************//
$app = new \Slim\App(["settings" => $config]);
//echo "antes funcion";
echo $app->getContainer()->get('request')->getUri()->getPath();


$app->get('/', function (Request $request, Response $response) { 
    echo "hola";   
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});
//echo "despues funcion";
$app->post('[/]', function (Request $request, Response $response) {   
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;

});
/*
$app->get('/ruteo', function (Request $request, Response $response) { 
    echo "hola";   
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});*/

$app->get('/ruteo/{id}', function ($request, $response, $args)
{
    $id=$args["id"];
    echo $id;

    return $response;
});

$app->any('/ruteo/[{id}]', function ($request, $response, $args)
{
    if(isset($args["id"])){
    $id=$args["id"];
    echo $id;
    }
    return $response;
});

$app->any('/ruteo/', function ($request, $response, $args)
{
    $app->put("/",function ($request, $response, $args){

        $response->getBody()->write("Put AGRUPADO!!");
        return $response;
    });
    $app->map["GET"]["POST"]("/",function ($request, $response, $args){

        $response->getBody()->write("Put AGRUPADO!!");
        return $response;
    });

    return $response;
    
});

$app->run();