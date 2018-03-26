<?php 

function MiFuncion()
{
    for($x=1;$x<5;$x++)
    {
        echo "<br>"."-----".$x."------";
        for($y=1;$y<5;$y++)
        {
            echo "<br>".pow($x,$y);
        }

    }
}

MiFuncion();
?>