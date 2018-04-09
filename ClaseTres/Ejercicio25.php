<?php

$path="archivos/palabras.txt";

$arch1=fopen($path,"w");

$funciono=fwrite($arch1,"a aa aaa aaaa aaaaa aaaaa");

fclose($arch1);

$arch1=fopen($path,"r");

//$texto=fread($arch1,filesize($path));

while(!feof($arch1))
{
    $palabras=fgets($arch1);
}

$palabras=explode(" ",$texto);

$unaLetra=0;
$dosLetras=0;
$tresLetras=0;
$cuatroLetras=0;
$masCuatroLetras=0;

foreach($palabras as $value)
{
    if($value==1)
    {
        $unaLetra=$unaLetra+1;
    }
    else if($value==2)
    {
        $dosLetras=$dosLetras+1;
    }
    else if($value==3)
    {
        $tresLetras=$tresLetras+1;
    }
    else if($value==4)
    {
        $cuatroLetras=$cuatroLetras+1;
    }
    else if($value>4)
    {
        $masCuatroLetras=$masCuatroLetras+1;
    }


}

echo "Una letra: ".$unaLetra."<br>Dos Letras: ".$dosLetras."<br> Tres Letras: ".$tresLetras."<br>Cuatro Letras: ".$cuatroLetras."<br>Mas Cuatro Letras: ".$masCuatroLetras;



