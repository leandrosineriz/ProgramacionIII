<?php

require_once "./clases/IMiddleware.php";

class Verificadora implements IMiddleware{

    public function VerificarUsuario($request,$response,$next)
    {
        if(!$request->isGet())
        {
            $conStr="mysql:host=localhost;dbname=cdcol";
            $user="root";
            $pass="";
    
            $usuario=json_decode(json_encode($request->getParsedBody()));
    
            $consulta="SELECT * FROM usuarios WHERE usuarios.nombre=\"".$usuario->nombre."\" AND usuarios.clave=".$usuario->clave;
    
            try{

                $objPDO=new PDO($conStr,$user,$pass);
    

                $r=$objPDO->Prepare($consulta);
    
            
                $r->Execute(); 

                if($r->rowCount()==1)
                {
                    $response->getBody()->write("ACCESO OTROGADO<br>");
                
                    $response = $next($request,$response);
                }
                else
                {
                    $response->getBody()->write("ACCESO DENEGADO<br>");
                }          
            }catch(Exception $e){

                $response->getBody()->write("ERROR DE CONEXION A LA BASE<br>");
            }
            

        }
        else
        {
           // $response = $next($request,$response);
           $response->getBody()->write("USUARIO NO ENCONTRADO!!<br>");

        }

        return $response;
    }

    
}


?>



