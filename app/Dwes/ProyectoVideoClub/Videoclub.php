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
    /*
     * el cual debe recibir un array con los productos a alquilar.
Antes de alquilarlos, debe comprobar que todos los soportes estén disponibles,
     de manera que si uno no lo está, no se le alquile ninguno.
     */
        function alquilarSocioProductos(int $numSocio, array $numerosProductos){
            if(!is_null($this->socios[$numSocio])){
                    if (empty($this->productos) || sizeof($this->productos)==0){
                        for($i=0;$i<count($numerosProductos);$i++)  {
                            $numerosProductos[$i]->incluirProducto( $numerosProductos->getNumero());
                            $numProductosAlquilados++;
                        }
                    }


            }
            else{
                echo "Hay al menos un soporte que no esta disponible";
            }


}

    public function devolverSocioProducto($numCliente,$numProducto){
        $cliente=0;
        $producto=0;
        $existeC=false;
        $existeP=false;

        for($i=0;$i<count($this->clientes);$i++)
        {
            if(!is_null($this->clientes[$i]))
            {
                if($this->clientes[$i]->getNumero()==$numCliente){
                    $cliente= $i;
                    $existeC=true;
                }

            }

            }

        for($i=0;$i<count($this->productos);$i++)
        {
            if(!is_null($this->productos[$i]))
            {
                if($this->productos[$i]->getNumero()()==$numProducto)
                    $producto= $i;
                    $existeP=true;

            }
        }

        if ($existeC && $existeP){
            $this->productos[$producto]->setAlquilado(false);
            $this->clientes[$cliente]->devolver($this->productos[$producto]);

        }
        else{
            echo "<br/>No existe cliente o producto";

        }
        return $this;
    }

        function devolverSocioProductos(int $numSocio, array $numerosProductos){
            $cliente=0;
            $existeC=false;

            for($i=0;$i<count($this->clientes);$i++)
            {
                if(!is_null($this->clientes[$i]))
                {
                    if($this->clientes[$i]->getNumero()==$numSocio){
                        $cliente= $i;
                        $existeC=true;
                    }

                }

            }
            if ($existeC){
                for($i=0;$i<count($numerosProductos);$i++)
                {
                    if(!is_null($numerosProductos[$i]))
                    {
                        $this->productos[$i]->setAlquilado(false);
                        $this->clientes[$cliente]->devolver($numerosProductos[$i]->getNumero());

                    }
            }
        } else{
                echo "<br/>No existe cliente o producto";

            }
            return $this;
}



}



?>