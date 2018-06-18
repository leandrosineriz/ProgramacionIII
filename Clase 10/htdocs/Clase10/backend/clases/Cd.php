<?php

class CD{

    public static function TraerCds()
    {
        $conStr="mysql:host=localhost;dbname=cdcol";
        $user="root";
        $pass="";

        $consulta="SELECT titel AS titulo , interpret AS interprete , jahr AS anio FROM cds";

        $objPDO=new PDO($conStr,$user,$pass);

        $r=$objPDO->Prepare($consulta);

        $r->Execute();

        $response='<table class="table table-hover"><thead><tr><th scope="col">Album</th><th scope="col">Interprete</th><th scope="col">Año</th></tr><tbody>';

        while($fila= $r->fetch())
        {      
            $response.='<tr><td>'.$fila[0].'</td><td>'.$fila["interprete"].'</td><td>'.$fila[2].'</td><tr>';
        }
        $response.='</tbody></table>';

        return $response;

    }

    public static function AgregarCds($titulo,$interprete,$anio)
    {
        $conStr="mysql:host=localhost;dbname=cdcol";
        $user="root";
        $pass="";

        $consulta="INSERT INTO `cds`(`titel`, `interpret`, `jahr`) VALUES (\"$titulo\",\"$interprete\",$anio)";

        $retorno=true;

        try{

            $objPDO=new PDO($conStr,$user,$pass);

            $r=$objPDO->Prepare($consulta);        
   
            if(!$r->Execute())
            {
                $retorno=false;
            }
            
        }catch(Exception $r){

            $retorno=false;
        }

        return $retorno;

    }

    public static function EliminarCd($id)
    {
        $retorno=true;

        
            $conStr="mysql:host=localhost;dbname=cdcol";
            $user="root";
            $pass="";

            $consulta="DELETE FROM `cds` WHERE cds.id=$id";

            try{

                $objPDO=new PDO($conStr,$user,$pass);

                $r=$objPDO->Prepare($consulta);  
                
                $r->Execute();    
   
                if($r->rowCount()==0)
                {
                    $retorno=false;
                }
            
            }catch(Exception $r){

                $retorno=false;
            }
        

        return $retorno;
    }

    public static function ValidarSA($request,$response,$next)
    {
        $conStr="mysql:host=localhost;dbname=cdcol";
        $user="root";
        $pass="";
        
        $usuario=json_decode(json_encode($request->getParsedBody()));
        
        $consulta="SELECT * FROM usuarios WHERE usuarios.nombre=\"".$usuario->nombre."\" AND usuarios.clave=".$usuario->clave." AND usuarios.perfil=\"super_admin\"";
        
        try{
            
            $objPDO=new PDO($conStr,$user,$pass);
            
            
            $r=$objPDO->Prepare($consulta);
            
            
            $r->Execute(); 
            
            if($r->rowCount()==1){          
                $response = $next($request,$response);                  
            }
            else
            
            {
                $response->getBody()->write("ESTA CUENTA NO TIENE DERECHOS SUPER ADMIN<br>");               
            }  
            
        }catch(Exception $e){
            
            $response->getBody()->write("ERROR DE CONEXION A LA BASE<br>");
        }
        
        return $response;
    }
}



?>