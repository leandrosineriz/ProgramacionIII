<?php

$base="utn";
$host="localhost";
$user="root";
$pass="";

$con=mysql_connect($host,$user,$pass);

if(!$con)
{
    echo mysql_error();
}
else
{
$sql="SELECT * FROM productos";

$rs=mysql_db_query($base,$sql);

while($row=mysql_fetch_object($rs))
{
    var_dump($row);
}

mysql_close($con);
}


?>