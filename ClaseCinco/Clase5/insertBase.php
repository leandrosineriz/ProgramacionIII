<?php

$base="utn";
$host="localhost";
$user="root";
$pass="";

    $con=mysql_connect($host,$user,$pass);

    $sqlInsert="INSERT INTO productos (pNumero, pNombre, Precio, Tamaño) 
    VALUES (10,'Chicle','1,55','Chico')";

    mysql_db_query($base,$sqlInsert);


    mysql_close($con);

?>