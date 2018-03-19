<?php
$array=array();
$contador=0;
$sumador=0;
while($contador<10)
{
    $sumador+=1;

    if($sumador%2!=0)
    {
        array_push($array,$sumador);
        $contador++;
    }

}
echo "CON FOR <br>";
for($x=0;$x<10;$x++)
{
    echo $array[$x],"<br>";
}

echo "CON WHILE <br>";
$contador=0;

while($contador<10)
{
    echo $array[$contador],"<br>";
    $contador++;
}

echo "CON FOREACH<br>";

foreach($array as $valor)
{
    echo $valor,"<br>";
}


