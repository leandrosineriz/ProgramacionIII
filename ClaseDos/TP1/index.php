<?php

require_once "ClasesTP1/Persona.php";
require_once "ClasesTP1/Empleado.php";
require_once "ClasesTP1/Fabrica.php";

$empleadoUno = new Empleado("Juan","Perez","Masculino",38701353,106001,20000,"Noche");
$idiomas=array("Español","Ingles","Portugues");
echo $empleadoUno->__toString()."<br>";
echo $empleadoUno->Hablar($idiomas);

$fabrica=new Fabrica("a");
$fabrica->AgregarEmpleado($empleadoUno);
$fabrica->AgregarEmpleado($empleadoUno);

echo $fabrica;

echo $fabrica->CalcularSueldo();

$fabrica->EliminarEmpleado($empleadoUno);

echo $fabrica;

?>