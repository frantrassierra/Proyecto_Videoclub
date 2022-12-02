<?php
namespace Dwes\ProyectoVideoclub;
include_once "Resumible.php";
const IVA = 21;

abstract class Soporte implements Resumible{
    public  $titulo;
    protected  $numero;
    private  $precio;
    public $alquilado;



    public function __construct($titulo,$numero,$precio,$alquilado=false)
    {
        $this->titulo=$titulo;
        $this->numero=$numero;
        $this->precio=$precio;
        $this->alquilado=$alquilado;
    }

    /**
     * @param false|mixed $alquilado
     */
    public function setAlquilado($alquilado)
    {
        $this->alquilado = $alquilado;
    }
    /**
     * @return false|mixed
     */
    public function getAlquilado()
    {
        return $this->alquilado;
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