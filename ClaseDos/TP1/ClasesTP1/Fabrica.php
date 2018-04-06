<?php

class Fabrica
{
    private $_cantidadMaxima;
    private $_empleados;
    private $_razonSocial;

    public function __construct($razonSocial)
    {
        $this->_cantidadMaxima=5;
        $this->_razonSocial=$razonSocial;
        $this->_empleados=array();
    }

    public function AgregarEmpleado($emp1)
    {
        array_push($this->_empleados,$emp1);
        $this->EliminarEmpleadoRepetido();

    }

    public function CalcularSueldo()
    {
        $retorno=0;
        foreach($this->_empleados as $value)
        {
           $retorno=$retorno+$value->GetSueldo();
        }

        return $retorno;
    }

    public function EliminarEmpleado($emp)
    {
        $clave=array_search($emp,$this->_empleados);
        
        unset($this->_empleados[$clave]);


    }

    public function EliminarEmpleadoRepetido()
    {

        $this->_empleados=array_unique($this->_empleados);

    }

    
    public function __toString()
    {
        $retorno="<br>Empleados :";
        foreach($this->_empleados as $value)
        {
            $retorno=$retorno.$value->__toString()."<br>";
        } 

        return $retorno;
    }

}