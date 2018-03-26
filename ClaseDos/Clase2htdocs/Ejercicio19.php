<?php
require "ClasesEjercicio19/FiguraGeometrica.php";
require "ClasesEjercicio19/Rectangulo.php";
require "ClasesEjercicio19/Triangulo.php";

$rectangulo = new Rectangulo(4,5);
$triangulo = new Triangulo(4,5);

$rectangulo->SetColor("red");

echo $rectangulo->ToString();
echo $rectangulo->Dibujar();

$triangulo->SetColor("blue");

echo $triangulo->ToString();
echo $triangulo->Dibujar();


?>