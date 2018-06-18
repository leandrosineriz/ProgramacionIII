<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once "clases/MiClase.php";
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


/*
$app->get('/', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});
//echo "despues funcion";
$app->post('/', function (Request $request, Response $response) {   
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;

});*/
//Middleware a nivel de aplicacion

$app->add(function($request,$response,$ndr){
    $response->getBody()->write("aNTES DE MIDDLEWARE NIVEL APLICACION!!! UNO<br>");

    $response = $ndr($request,$response);

    $response->getBody()->write("Despues de Middleware NIVEL APLICACION!!! UNO<br>");

    return $response;
});

//Middleware a un solo verbo
/*
$app->put('/', function (Request $request, Response $response) {   
    $response->getBody()->write(" PUT => Bienvenido!!! a SlimFramework");
    return $response;

})->add(function($request,$response,$ndr){
    $response->getBody()->write("ANTES DE MIDDLEWARE");

    $response = $ndr($request,$response);

    $response->getBody()->write("Despues de Middleware");

    return $response;
});
*/

//Middleware a grupo
$app->group('/Credenciales', function () { 

    $this->get("[/]", function (Request $request, Response $response){
        $response->getBody()->write("ESTOY EN GET NIVEL API!!<br>");
        return $response;
    });

    $this->post("[/]", function (Request $request, Response $response){
        $response->getBody()->write("ESTOY EN POST NIVEL API!!<br>");
        return $response;

    })->add(function ($request,$response,$ndr){
        $response->getBody()->write("ANTES DE MIDDLEWARE NIVEL API!!! TRES<br>");

        $response = $ndr($request,$response);

        $response->getBody()->write("DESPUES DE MIDDLEWARE NIVEL API!!! TRES<br>");

        return $response;
    });

})->add(function ($request,$response,$ndr){
    $response->getBody()->write("ANTES DE MIDDLEWARE NIVEL GRUPO!!! DOS<br>");

    if($request->isPost())
    {
        
        //$usuario=json_decode(json_encode($request->getParsedBody()));
        $usuario=json_decode(json_encode($request->getParsedBody()));

        if(isset($usuario->perfil))
        {
            if($usuario->perfil=="admin")
            {
                $response->getBody()->write("Bienvenido!!!".$usuario->nombre."<br>");
                $response = $ndr($request,$response);
                
            }
            else{
                $response->getBody()->write("Usuario Incorrecto<br>");
            }

        }
        else{
            $response->getBody()->write("ERROR!!!<br>");
        }
    }
    else if($request->isGet())
    {
        $response = $ndr($request,$response);
        
    }

    $response->getBody()->write("DESPUES DE MIDDLEWARE NIVEL GRUPO!!! DOS<br>");

    return $response;
    
});

$app->group('/Validar', function () { 

    $this->get("[/]", function (Request $request, Response $response){
        $response->getBody()->write("ESTOY EN GET NIVEL API!!<br>");
        return $response;
    });

    $this->post("[/]", function (Request $request, Response $response){
        $response->getBody()->write("ESTOY EN POST NIVEL API!!<br>");
        return $response;

    })->add(function ($request,$response,$ndr){
        $response->getBody()->write("ANTES DE MIDDLEWARE NIVEL API!!! TRES<br>");

        $response = $ndr($request,$response);

        $response->getBody()->write("DESPUES DE MIDDLEWARE NIVEL API!!! TRES<br>");

        return $response;
    });

})->add(\MiClase::class."::MostrarEstatico");

$app->run();