<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 26</title>
</head>
<body>
    <form action="">
    <input type="text" name="txtArchivo" id="txtArchivo">
    <button type="submit" >Enviar</button>
    </form>
</body>
</html>

<?php

$pathOrigin=$_GET["txtArchivo"];

$arch=fopen($pathOrigin,"r");

$texto=fread($arch,filesize($pathOrigin));

$textoInvertido=strrev($texto);

fclose($arch);

$pathCopy="archivos/".date("y_m_d_h_i_s").".txt";

$arch=fopen($pathCopy,"w");

fwrite($arch,$textoInvertido);

fclose($arch);


?>