<?php

class Empleado extends Persona
{
    protected $_legajo;
    protected $_sueldo;
    protected $_turno;

    public function __construct($nombre,$apellido,$sexo,$dni,$legajo,$sueldo,$turno)
    {
        parent :: __construct($nombre,$apellido,$sexo,$dni);
        $this->_legajo=$legajo;
        $this->_sueldo=$sueldo;
        $this->_turno=$turno;

    }

    public function GetLegajo()
    {
        return $this->_legajo;
    }

    public function GetSueldo()
    {
        return $this->_sueldo;
    }
    public function GetTurno()
    {
        return $this->_turno;
    }

    public function Hablar($idioma)
    {
        
        return "El empleado habla: ".$idioma;


    }

    public function ToString()
    {
        return parent::ToString()." - Legajo: ".$this->_legajo." - Sueldo: ".$this->_sueldo." - Turno: ".$this->_turno;
    }
}

?>