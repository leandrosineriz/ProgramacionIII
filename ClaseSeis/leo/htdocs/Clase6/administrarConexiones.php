<?php
require_once "./cd.php";
$ordenComando=isset($_POST["ordenComando"])?$_POST["ordenComando"]:null;

    $conStr="mysql:host=localhost;dbname=cdcol";
    $user="root";
    $pass="";

    /*necesito una clase para el fetchObject no un obj
    $cd=new stdClass();
    $cd->titulo="";
    $cd->interprete="";
    $cd->anio="";*/
switch($ordenComando)
{
    case "conexionBasica":
    
    try{
        $conexion=new PDO($conStr,$user,$pass);
        echo "Conexion establecida";
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        echo "Error de conexion";
    }
    break;

    case "fetchAll":
    $consulta="SELECT * FROM cds";

    $objPDO=new PDO($conStr,$user,$pass);

    $sql=$objPDO->query($consulta);

    $r=$sql->fetchAll();

    foreach($r as $fila)
    {
        echo $fila[0]."-".$fila[1]."-".$fila[2]."---";
    }

    break;


    case "fetchObject":

    $consulta="SELECT titel AS titulo , interpret AS interprete , jahr AS anio FROM cds";

    $objPDO=new PDO($conStr,$user,$pass);

    $sql=$objPDO->query($consulta);

    while($cd=$sql->fetchObject("CD"))
    {
        echo $cd->Mostrar();
    }

    break;

    case "sentenciasPreparadas":
    $consulta="SELECT titel AS titulo , interpret AS interprete , jahr AS anio FROM cds";

    $objPDO=new PDO($conStr,$user,$pass);

    $r=$objPDO->Prepare($consulta);

    $r->Execute();

    echo "FETCH: ";
    while($fila= $r->fetch())
    {
        echo $fila[0]."-".$fila["interprete"]."-".$fila[2]."---";
    }

    $r->Execute();
    echo "<br> FETCHALL: ";
    foreach($r->fetchAll() as $fila)
    {
        echo $fila[0]."-".$fila["interprete"]."-".$fila[2]."---";
    }

    echo "<br> FETCHOBJECT: ";
    $r->Execute();
    while($cd=$r->fetchObject("CD"))
    {
        echo $cd->Mostrar();
    }

    break;

    case "bindParam":

    $consulta="SELECT titel AS titulo , interpret AS interprete , jahr AS anio FROM cds WHERE id=:id";

    $id=isset($_POST["id"])?$_POST["id"]:NULL;
    $objPDO=new PDO($conStr,$user,$pass);

    $r=$objPDO->Prepare($consulta);

    $r->bindParam(":id",$id);
    $r->Execute();

    var_dump($r->fetchAll());

    $id=4;

    $r->Execute();
    echo "<br>";
    var_dump($r->fetchAll());

    break;

    case "bindColumn":
    $consulta="SELECT titel AS titulo , interpret AS interprete , jahr AS anio FROM cds";

    $objPDO=new PDO($conStr,$user,$pass);

    $r=$objPDO->Prepare($consulta);

    $r->bindColumn("titulo",$colTitulo);
    $r->bindColumn("interprete",$colInterprete);
    $r->bindColumn("anio",$colAnio);
    
    $r->Execute();

    while($r->fetch(PDO::FETCH_BOUND))
    {
        echo $colTitulo."-".$colInterprete."-".$colAnio."-----";
    }

    break;

    case "ejercicio1":

    $consulta="SELECT titel AS titulo , interpret AS interprete , jahr AS anio FROM cds";

    $objPDO=new PDO($conStr,$user,$pass);

    $r=$objPDO->Prepare($consulta);
    
    $r->Execute();

    $cd=new CD();
    while($cd=$r->fetch(PDO::FETCH_CLASS,new CD))
    {
        echo $cd->Mostrar();
    }

    break;
    default:
    echo "NULL";
    

    
}

?>