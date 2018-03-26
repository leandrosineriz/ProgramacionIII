<?php

abstract class FiguraGeometrica
{
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    public function __construct()
    {

    }

    protected abstract function CalcularDatos();
    
    

    public abstract function Dibujar();
    

    

    public function GetColor()
    {
        return $this->_color;

    }

    public function SetColor($value)
    {
        $this->_color=$value;

    }

    public function ToString()
    { 
        return "<br>Color = ".$this->_color." - Perimetro = ".$this->_perimetro." - Superficie = ".$this->_superficie;
    }



}