<?php

require_once "ClasesTP1/Persona.php";
require_once "ClasesTP1/Empleado.php";


$empleadoUno = new Empleado("Juan","Perez","Masculino",38701353,106001,20000,"Noche");
$idiomas=array("Español","Ingles","Portugues");
$empleadoUno->ToString();
$empleadoUno->Hablar($idiomas);



?>