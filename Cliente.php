<?php

class Cliente{

    public $nombre;
    private $numero;
    private $soportesAlquilados;
    private $numSoportesAlquilados ;
    private $maxAlquilerConcurrente;

    /**
     * @param $nombre
     * @param $numero
     * @param int $maxAlquilerConcurrente
     */
    public function __construct($nombre, $numero, int $maxAlquilerConcurrente=3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;

        $this->numSoportesAlquilados=0;
        $this->soportesAlquilados=array();

        for($i=0;$i<$maxAlquilerConcurrente;$i++){
            $this->soportesAlquilados[$i]=null;}


    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getNumSoportesAlquilados()
    {
        $contador=0;
        for($i=0;$i<$this->maxAlquilerConcurrente;$i++){
                    if(!is_null($this->soportesAlquilados[$i])){
                $contador++;
            }
        }
        echo "El numero de soportes alquilados es: ". $contador;
    }

    public function muestraResumen(){
        echo "Cliente: ". $this->nombre  .  "<br>Cantidad de alquileres: ".$this->getNumSoportesAlquilados();
    }

}

?>
