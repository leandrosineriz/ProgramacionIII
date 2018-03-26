<?php

class Rectangulo extends FiguraGeometrica
{
    private $_ladoUno;
    private $_ladoDos;

    public function __construct($l1,$l2)
    {       
        $this->_ladoUno=$l1;
        $this->_ladoDos=$l2;
        $this->CalcularDatos();
    }

    protected function CalcularDatos()
    {
        $this->_perimetro=$this->_ladoUno*2+$this->_ladoDos*2;
        $this->_superficie=$this->_ladoUno*$this->_ladoDos;

    }

    public function Dibujar()
    {
        $dibujo="<font color=\"".$this->GetColor()."\">";
        for($x=0;$x<$this->_ladoUno;$x++)
        {
            $dibujo=$dibujo. "<br>";
            for($y=0;$y<$this->_ladoDos;$y++)
            {
                $dibujo=$dibujo. "*";
            }
        }

        $dibujo=$dibujo."</font>";

        return $dibujo;


    }

    public function ToString()
    {
        return parent::ToString()." - Lado Uno = ".$this->_ladoUno." - Lado Dos = ".$this->_ladoDos;

    }
}
?>