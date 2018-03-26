<?php

class Triangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;

    public function __construct($b,$a)
    {       
        $this->_altura=$a;
        $this->_base=$b;
        $this->CalcularDatos();
    }

    protected function CalcularDatos()
    {
        $this->_perimetro=(tan(90)*($this->_base/2))*2+$this->_base;

        

        $this->_superficie=($this->_base*$this->_altura)/2;

    }

    public function Dibujar()
    {
        //EL TRIANGULO ES UNA MIERDA NO FUNCIONA

        /*
        $dibujo= "<font color=\"".$this->GetColor()."\">";
        for($x=0;$x<$this->_altura;$x++)
        {
            $dibujo=$dibujo. "<br>";
            for($y=0;$y<$this->_base;$y++)
            {
                $dibujo=$dibujo. "*";
            }
        }

        $dibujo=$dibujo. "</font>";

        return $dibujo;

        */

        return "<br><font color=\"".$this->GetColor()."\">"."SOY UN TRIANGULO"."</font>";
    }

    public function ToString()
    {
        return parent::ToString()." - Altura = ".$this->_altura." - Base = ".$this->_base;

    }
}
?>