<?php
$vec=array();
$contador=0;
$sumador=0;

for($x=0;$x<5;$x++)
{
    array_push($vec,mt_rand(1,10));
}


while($contador<5)
{

    $sumador=$sumador+$vec[$contador];

    $contador++;

}

$resultado=$sumador/5;

echo (int)$resultado,"<br>";

if((int)$resultado<6)
{
    echo "EL PROMEDIO ES MENOR A 6";
}
else if((int)$resultado>6)
{
    echo "EL PROMEDIO ES MAYOR A 6";
}
else if((int)$resultado==6)
{
    echo "EL PROMEDIO ES IGUAL A 6";
}

echo "<br>";
var_dump($vec);

?>