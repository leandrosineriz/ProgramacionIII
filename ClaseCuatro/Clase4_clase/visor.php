<?php

require_once "administracion.php";

$pathArchivoTxt="misImagenes.txt";

$archivoTxt=fopen($pathArchivoTxt,"r");

$nombresImagenes=fread($archivoTxt,filesize($pathArchivoTxt));

$nombresImagenes=explode("\n",$nombresImagenes);

$mostrar="<table>";

foreach($nombresImagenes as $value)
{
    
    if($value!="")
    {
        $mostrar=$mostrar."<tr><td><a href='zoom.php?id=".$value."'><img src='archivos/".$value."' width='100' heigt='100'; alt='imagen'></a><td><tr>";

    }
}

$mostrar=$mostrar."</table>";

echo $mostrar;

?>

