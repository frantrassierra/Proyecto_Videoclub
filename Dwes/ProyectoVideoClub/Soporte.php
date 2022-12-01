<?php
namespace Dwes\ProyectoVideoclub;
include "Dvd.php";
include "CintaVideo.php";
include "Juego.php";
const IVA = 21;

abstract class Soporte implements Resumible{
    public  $titulo;
    protected  $numero;
    private  $precio;



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
        $precioConIva=($this->precio*IVA/100);
        return $this->precio+$precioConIva;
    }
    public function muestraResumen(){
        echo "<br>".$this->titulo . "<br>" . $this->precio ." € ". "(IVA NO INCLUIDO)";
    }
}

?>