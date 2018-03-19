<?php
$num=0;
$contador=0;

while($num<1000)
{
    echo $num,"<br>";
    $contador++;
    $num=$num+$contador;
    
}

echo "SE SUMARON=",$contador;
?>