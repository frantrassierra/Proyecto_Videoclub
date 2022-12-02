<?php

namespace Dwes\ProyectoVideoclub;

include_once("Soporte.php");
include_once("CintaVideo.php");
include_once("Dvd.php");
include_once("Juego.php");
include_once("Resumible.php");
include_once("Cliente.php");




/**
 * include_once("Soporte.php");
include_once("Cliente.php");
include_once("CintaVideo.php");
include_once("Dvd.php");
include_once("Juego.php");

include_once("Resumible.php");
 */



class videoclub{


    private $nombre;
    private $numProductos;
    private $numSocios;

    private $productos;
    private $socios;
    private $numProductosAlquilados;
    private $numTotalAlquileres;


    public function __construct($nombre)  {

        $this->nombre=$nombre;
        $this->productos=array();
        $this->socios=array();
        $this->numProductos=0;
        $this->numSocios=0;
        $numProductosAlquilados=0;
        $numTotalAlquileres=0;
    }

    /**
     * @return mixed
     */
    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }

    /**
     * @return mixed
     */
    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }

    private function incluirProducto( $p)   {

        $this->productos[$this->numProductos]=$p;
        $this->numProductos++;

        echo "Se ha añadido correctamente el producto " . $this->numProductos ." <br>";

    }

    function incluirSocio($nombre,$maxAlquileresConcurrentes=3){
        $socioNuevo = new Cliente($nombre,$this->numSocios,$maxAlquileresConcurrentes);

        $this->socios[$this->numSocios]=$socioNuevo;
        $this->numSocios++;
        echo "<br> Se ha añadido correctamente el socio" . $this->numSocios . "<br>";

    }

    public function incluirCintaVideo($titulo,$precio,$duracion){

        $nuevaCinta=new CintaVideo($titulo,$this->numProductos,$precio,$duracion);

        $this->incluirProducto($nuevaCinta);

    }


    public function incluirDvd($titulo,$precio,$idiomas,$pantalla){
        $nuevoDvD=new Dvd($titulo,$this->numProductos,$precio,$idiomas,$pantalla);
        $this->incluirProducto($nuevoDvD);
    }


    public function incluirJuego($titulo,$precio,$consola,$minJ,$maxJ)   {

        $nuevJuego=new Juego($titulo,$this->numProductos,$precio,$consola,$minJ,$maxJ);

        $this->incluirProducto($nuevJuego);
    }




    public function listarProductos() {
        for($i=0;$i<count($this->productos);$i++)  {

            if(!is_null($this->productos[$i])){
                $this->productos[$i]->muestraResumen();
            }
        }
    }


    public function listarSocios()  {

        for($i=0;$i<count($this->socios);$i++) {
            if(!is_null($this->socios[$i]))
                $this->socios[$i]->muestraResumen();
        }
    }



    function alquilaSocioProducto($numeroCliente,$numeroSoporte){

        try {
            if (!is_null($this->socios[$numeroCliente])){

            }
            elseif(!is_null($this->productos[$numeroSoporte])){
            }else{
                $this->socios[$numeroCliente]-> alquilar($this->productos[$numeroSoporte]);
            }


        } catch (ClienteNoEncontradoException $e) {
            echo "No se ha encontrado el cliente".$e->miFuncion();
        } catch(SoporteNoEncontradoException $e) {
            echo "No se ha encontrado el soporte". $e->getMessage();
        }


        return $this;

    }



}



?>