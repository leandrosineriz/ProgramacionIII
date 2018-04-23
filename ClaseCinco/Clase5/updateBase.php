<?php

$base="utn";
$host="localhost";
$user="root";
$pass="";

    $con=mysql_connect($host,$user,$pass);

    $sqlUpdate="UPDATE productos SET pNumero=100, pNombre='Lapiz', Precio='20,50' WHERE pNumero=10";

    mysql_db_query($base,$sqlUpdate);


    mysql_close($con);

?>