<?php

abstract class Persona
{
    private $_apellido;
    private $_nombre;
    private $_dni;
    private $_sexo;

    public function __construct($nombre,$apellido,$sexo,$dni)
    {
        $this->_apellido=$apellido;
        $this->_nombre=$nombre;
        $this->_sexo=$sexo;
        $this->_dni=$dni;

    }

    public function GetNombre()
    {
        return $this->_nombre;
    }

    public function GetApellido()
    {
        return $this->_apellido;
    }
    public function GetSexo()
    {
        return $this->_sexo;
    }
    public function GetDni()
    {
        return $this->_dni;
    }

    public abstract function Hablar($idioma);
    

    public function ToString()
    {
        return "<br>Nombre: ".$this->_nombre." - Apellido: ".$this->_apellido." - Dni: ".$this->_dni." - Sexo: ".$this->_sexo;
    }
}

?>
