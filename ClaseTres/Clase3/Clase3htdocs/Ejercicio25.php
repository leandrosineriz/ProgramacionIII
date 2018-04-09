<?php

$path="archivos/palabras.txt";

$arch1=fopen($path,"w");

$funciono=fwrite($arch1,"a aa aaa aaaa aaaaa aaaaa");

fclose($arch1);

$arch1=fopen($path,"r");

//$texto=fread($arch1,filesize($path));

while(!feof($arch1))
{
    $texto=fgets($arch1);
}

fclose($arch1);

$palabras=explode(" ",$texto);

$unaLetra=0;
$dosLetras=0;
$tresLetras=0;
$cuatroLetras=0;
$masCuatroLetras=0;

foreach($palabras as $value)
{
    
    if(strlen($value)==1)
    {
        $unaLetra=$unaLetra+1;
    }
    else if(strlen($value)==2)
    {
        $dosLetras=$dosLetras+1;
    }
    else if(strlen($value)==3)
    {
        $tresLetras=$tresLetras+1;
    }
    else if(strlen($value)==4)
    {
        $cuatroLetras=$cuatroLetras+1;
    }
    else if(strlen($value)>4)
    {
        $masCuatroLetras=$masCuatroLetras+1;
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
<tr>
<td>
Una
</td>
<td>
Dos
</td>
<td>
Tres
</td>
<td>
Cuatro
</td>
<td>
+Cuatro
</td>
</tr>

<tr>
<td>
<?php echo $unaLetra; ?>
</td>
<td>
<?php echo $dosLetras; ?>
</td>
<td>
<?php echo $tresLetras; ?>
</td>
<td>
<?php echo $cuatroLetras; ?>
</td>
<td>
<?php echo $masCuatroLetras; ?>
</td>
</tr>
</table>
    
</body>
</html>

