<?php

class Soporte{
    public  $titulo;
    protected  $numero;
    private  $precio;

    private const IVA = 21;

    public function __construct($titulo,$numero,$precio)
    {
        $this->titulo=$titulo;
        $this->numero=$numero;
        $this->precio=$precio;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }
    public function getPrecioConIva(){
        $precioConIva=0;
        $precioConIva=($this->precio*self::IVA/100);
        return $this->precio+$precioConIva;
    }
    public function muestraResumen(){
        echo "<br>".$this->titulo . "<br>" . $this->precio ." € ". "(IVA NO INCLUIDO)";
    }
}

?>