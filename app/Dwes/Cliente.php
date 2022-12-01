<?php
namespace Dwes\ProyectoVideoclub;

class Cliente{

    public $nombre;
    private $numero;
    private $soportesAlquilados=array();
    private $numSoportesAlquilados;
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
        return $contador;
    }

    public function muestraResumen(){
        echo $this->nombre . "<br>Cantidad de alquileres: ".count($this->soportesAlquilados);
    }



    public function tieneAlquilado($s): bool{
        $existe=false;

        for ($i=0;$i<$this->maxAlquilerConcurrente;$i++){

            if (!is_null($this->soportesAlquilados[$i])){
                if ($this->soportesAlquilados[$i]->getNumero()== $s->getNumero()){
                    $existe= true;
                }
            }
        }

        return $existe;
    }

    public function alquilar( $s){
        if ($this->tieneAlquilado($s)){
            echo "El soporte ya está alquilado";
        }
        elseif ($this->getNumSoportesAlquilados()==$this->maxAlquilerConcurrente){
            echo "Ha superado el cupo de alquileres";
        }
        else {
            $contador=0;
            while(!is_null($this->soportesAlquilados[$contador])) {
                $contador++;  }

            $this->soportesAlquilados[$contador]=$s;

            $this->numSoportesAlquilados++;

        }
        echo "<br />El soporte lo a alquilado: ".$this->nombre. "<br>". $s-> muestraResumen();
        return $this;
    }

    public function devolver( int $numSoporte) {
        $existe=false;
        if($this->getNumSoportesAlquilados()==0)
        {
            echo "Este cliente no tiene ningun soporte <br>";
            return $existe;

        }

        for($i=0;$i<$this->maxAlquilerConcurrente;$i++) {
            if(!is_null($this->soportesAlquilados[$i]))
            {
                if($this->soportesAlquilados[$i]->getNumero()==$numSoporte)
                {
                    echo "<br />El soporte ha sido devuelto por ".$this->nombre;

                    $this->soportesAlquilados[$i]=null;
                    $this->numSoportesAlquilados--;
                    $existe=true;
                    return $existe;
                }
            }
        }

        echo "<br />El soporte no existe";

        return $this;

    }


    public function listaAlquileres(){
        if($this->getNumSoportesAlquilados()==0)
            echo "<br> Este cliente no tiene ningun soporte alquilado". "<br>";

        else{
            echo "<br />Alquileres de: ".$this->nombre."<br>";

            for($i=0;$i<$this->maxAlquilerConcurrente;$i++){
                if(!is_null($this->soportesAlquilados[$i])){

                    echo $this->soportesAlquilados[$i]->muestraResumen() . "<br>";
                }
            }
        }

    }


}

?>
