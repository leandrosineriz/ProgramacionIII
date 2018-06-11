<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once "./clases/Verificadora.php";

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;



//*********************************************************************************************//
//INICIALIZO EL APIREST
//*********************************************************************************************//
$app = new \Slim\App(["settings" => $config]);
//echo "antes funcion";


$app->get('/', function (Request $request, Response $response) {  
    
    $response->getBody()->write("Estoy en GET<br>");
    $response->getBody()->write(Verificadora::TraerCds($request,$response));
    return $response;
    
});

//echo "despues funcion";
$app->post('/', function (Request $request, Response $response) {   
    $response->getBody()->write("Estoy en POST<br>");
    return $response;
    
})->add(function ($request,$response,$ndr){
    
    $cd=json_decode(json_encode($request->getParsedBody()));
    
    if(Verificadora::AgregarCds($cd->titulo,$cd->interprete,$cd->anio))
    {
        $response->getBody()->write("CD Agregado<br>");
        
    }
    else
    {
        $response->getBody()->write("ERROR AL AGREGAR CD<br>");
        
    }
    
    $response = $ndr($request,$response);
    
    return $response;
});

$app->put('/', function (Request $request, Response $response) {   
    $response->getBody()->write("Estoy en PUT<br>");
    return $response;
    
})->add(function ($request,$response,$ndr){
    
    $cd=json_decode(json_encode($request->getParsedBody()));
    
    if(Verificadora::AgregarCds($cd->titulo,$cd->interprete,$cd->anio))
    {
        $response->getBody()->write("CD Modificado<br>");
        
    }
    else
    {
        $response->getBody()->write("ERROR AL MODIFICAR CD<br>");
        
    }
    
    $response = $ndr($request,$response);
    
    return $response;
});

$app->delete('/', function (Request $request, Response $response) {   
    $response->getBody()->write("Estoy en DELETE<br>");
    return $response;
    
})->add(function ($request,$response,$ndr){
    
    $cd=json_decode(json_encode($request->getParsedBody()));
    
    
    if(Verificadora::EliminarCd($cd->id))
    {
        $response->getBody()->write("CD Eliminado<br>");
        
    }
    else
    {
        $response->getBody()->write("ERROR AL ELIMINAR CD<br>");
        
    }
    
    $response = $ndr($request,$response);
    
    return $response;
})->add(\Verificadora::class."::ValidarSA");

$app->add(\Verificadora::class.":VerificarUsuario");   


$app->run();


?>
