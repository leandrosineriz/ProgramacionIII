<?php

//var_dump($_FILES);


//var_dump(getimagesize($_FILES["archivo"]["tmp_name"]));


//move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino);

$extension=strtolower(pathinfo($_FILES["archivo"]["name"],PATHINFO_EXTENSION));

$archivo_OK=true;

if($extension=="jpg" || $extension=="jpeg" || $extension=="png")
{
     echo "<span style='color:white'>El archivo tiene extension valido</span><br>";
     
}
else
{
    echo "el archivo tiene extension invalida";
    $archivo_OK=false;
}

$tamaño=getimagesize($_FILES["archivo"]["tmp_name"]);

if($tamaño!=false && $tamaño[0]<5000)
{
    echo "<span style='color:white'>Tamaño valido</span>";

}
else
{
    echo "Tamaño invalido";
    $archivo_OK=false;
}



if($archivo_OK)
{
    $destino="archivos/".date("ymdhis").".".$extension;

    move_uploaded_file($_FILES["archivo"]["tmp_name"],$destino);

    $archivoTxt=fopen("misImagenes.txt","a");

    fwrite($archivoTxt,str_replace("archivos/","",$destino)."\n");

    
    fclose($archivoTxt);
}
else
{
    $destino="archivos/descarga.png";
}

echo '<body style="background-color:blue">';

?>
