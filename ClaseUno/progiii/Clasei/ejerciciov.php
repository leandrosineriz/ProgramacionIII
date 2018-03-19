<?php
$a=15;
$b=30;
$c=15;

if($a>$b && $a>$c)
{
    if($b>$c)
    {
        echo $b;
    }
    else if($c>$b)
    {
        echo $c;
    }
    else
    {
        echo "NO HAY VALOR DEL MEDIO";
    }
}
else if($b>$a && $b>$c)
{
    if($a>$c)
    {
        echo $a;
    }
    else if($c>$a)
    {
        echo $c;
    }
    else
    {
        echo "NO HAY VALOR DEL MEDIO";
    }
}
else if($c>$a && $c>$b)
{
    if($b>$a)
    {
        echo $b;
    }
    else if($a>$b)
    {
        echo $a;
    }
    else
    {
        echo "NO HAY VALOR DEL MEDIO";
    }

}


?>
