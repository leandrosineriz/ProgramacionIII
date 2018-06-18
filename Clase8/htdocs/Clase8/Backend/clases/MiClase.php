<?php

require_once "InterfaceApiRest.php";

class MiClase implements InterfaceApiRest{

    public function MostrarInstancia($request,$response,$ndr)
    {
        $response->getBody()->write("ANTES DE METODO DE INSTANCIA");

        $response = $ndr($request,$response);

        $response->getBody()->write("Despues de METODO DE INSTANCIA");

        return $response;

    }
    public static function MostrarEstatico($request,$response,$ndr)
    {
        $response->getBody()->write("ANTES DE METODO ESTATICO");

        $response = $ndr($request,$response);

        $response->getBody()->write("Despues de METODO ESTATICO");

        return $response;

    }

    private static function ValidarUsuario($request,$response,$ndr){

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
    }
}