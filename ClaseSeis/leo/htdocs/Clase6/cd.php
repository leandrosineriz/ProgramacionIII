<?php

class CD{
    public $titulo;
    public $interprete;
    public $anio;

    public function Mostrar()
    {
        return $this->titulo."-".$this->interprete."-".$this->anio."---";
    }
    
    

}

?>