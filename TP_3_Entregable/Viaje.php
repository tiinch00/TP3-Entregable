<?php




class Viaje{

    private int $codigoViaje;
    private string $destinoViaje;
    private int $cantMaximaPasajerosViaje;
    private array $colPasajeros;
    private $objResponsableV;
    private $costoDelViaje;
    private $sumaCostosAbonados;


    public function __construct($codigo,$destino,$cantMaximaPasajeros,$pasajeros,$responsableV,$costoViaje, $sumaCostos){

        $this->codigoViaje = $codigo;
        $this->destinoViaje = $destino;
        $this->cantMaximaPasajerosViaje = $cantMaximaPasajeros;
        $this->colPasajeros = $pasajeros;
        $this->objResponsableV = $responsableV;
        $this->costoDelViaje = $costoViaje;
		$this->sumaCostosAbonados = $sumaCostos;
    }



    /**
     * Get the value of codigoViaje
     */ 
    public function getCodigoViaje()
    {
        return $this->codigoViaje;
    }

    /**
     * Set the value of codigoViaje
     *
     * @return  self
     */ 
    public function setCodigoViaje($codigo)
    {
        $this->codigoViaje = $codigo;

        
    }

    /**
     * Get the value of destinoViaje
     */ 
    public function getDestinoViaje()
    {
        return $this->destinoViaje;
    }

    /**
     * Set the value of destinoViaje
     *
     * @return  self
     */ 
    public function setDestinoViaje($destino)
    {
        $this->destinoViaje = $destino;

      
    }
    public function getCostoDelViaje() {
		return $this->costoDelViaje;
	}

	public function setCostoDelViaje($costoViaje) {
		$this->costoDelViaje = $costoViaje;
	}

    public function getSumaCostosAbonados() {
		return $this->sumaCostosAbonados;
	}

	public function setSumaCostosAbonados($sumaCostos) {
		$this->sumaCostosAbonados = $sumaCostos;
	}

    /**
     * Get the value of cantMaximaPasajerosViaje
     */ 
    public function getCantMaximaPasajerosViaje()
    {
        return $this->cantMaximaPasajerosViaje;
    }

    /**
     * Set the value of cantMaximaPasajerosViaje
     *
     * @return  self
     */ 
    public function setCantMaximaPasajerosViaje($cantMaximaPasajeros)
    {
        $this->cantMaximaPasajerosViaje = $cantMaximaPasajeros;

      
    }

    

     /**
     * Get the value of colPasajeros
     */
    public function getColPasajeros(){
        return $this->colPasajeros;
    }

    /**
     * Set the value of colPasajeros
     */
    public function setColPasajeros($pasajeros){
        $this->colPasajeros = $pasajeros;

       
    }
      /**
     * Get the value of objResponsableV
     */
    public function getObjResponsableV() {
        return $this->objResponsableV;
    }

    /**
     * Set the value of objResponsableV
     */
    public function setObjResponsableV($responsableV) {
        $this->objResponsableV = $responsableV;
       
    }
    /** retorna una coleccion en string
     * @param array
     * @return string
     */

    public function retornarCadena($coleccion){
		$cadena= "";

		foreach($coleccion as $elemento){

			$cadena = $cadena . " ". $elemento ."\n";
		}
		return $cadena;
	}
    

    public function __toString(){
        $cadena = "Cogido el viaje: " . $this->getCodigoViaje()."\n";
        $cadena .= "Destino del viaje: " . $this->getDestinoViaje()."\n";
        $cadena .= "Cantidad maxima de pasajeros: " . $this->getCantMaximaPasajerosViaje()."\n";
        $cadena .= "Los pasajeros son: " .$this->retornarCadena($this->getColPasajeros())."\n";
        $cadena .= "Costo base del pasaje " .$this->getCostoDelViaje()."\n";
        $cadena .= "Suma de costos ". $this->getSumaCostosAbonados()."\n";

        return $cadena;
    }
    



    

    public function estaPasajero($pasajero){

        $esta = false;
        $colPasajeros =$this->getColPasajeros();
        $i = 0;
        while($i<count($colPasajeros)&& !$esta){

            if ($colPasajeros[$i]->getDocumentoPasajero() == $pasajero->getDocumentoPasajero()){
                
                $esta = true;
            }
            $i++;

        }

        return $esta;
    }

    public function agregarPasajero($pasajero){

        $agrego = false;
        $colPasajeros = $this->getColPasajeros();
        $cantMaximaPasajeros = $this->getCantMaximaPasajerosViaje();

        if (count($colPasajeros)<$cantMaximaPasajeros){
            if(!$this->estaPasajero($pasajero)){

            $colPasajeros[]= $pasajero;

            $agrego = true;

            $this->setColPasajeros($colPasajeros);
            }

        }
        return $agrego;
    }

    public function mostrarPasajero($documentoPasajero){


        $pasajero = null;
        $encontrado = false;
        $pasajeroNro = 0;
        $colPasajeros = $this->getColPasajeros();

        if ($documentoPasajero != null){

            while ($pasajeroNro<count($colPasajeros)&&!$encontrado){

                if ($colPasajeros[$pasajeroNro]->getDocumentoPasajero() === $documentoPasajero) {
                    $encontrado = true;
                    $pasajero = $colPasajeros[$pasajeroNro];
                   
                }
                $pasajeroNro++;

            }
            return $pasajero;
        } 
     }

     /**Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método 
     * venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), 
     * actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.


     Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor 
     a la cantidad máxima de pasajeros y falso caso contrario */

     public function venderPasaje($objPasajero){

        $costoViaje =$this->getCostoDelViaje();
        $coleccionPasajeros =$this->getColPasajeros();
        $sumaCostos = $this->getSumaCostosAbonados();
        $precioFinal = 0;

        if ($this->hayPasajesDisponible()){

            $coleccionPasajeros[]= $objPasajero;
            $this->setColPasajeros($coleccionPasajeros);
            $incremento=$objPasajero->darPorcentajeIncremento();
            $costoViaje=$costoViaje+($costoViaje*$incremento);
            $sumaCostos=$sumaCostos+$costoViaje;
            $this->setSumaCostosAbonados($sumaCostos);
            $preciofinal=$costoViaje;
        }
        return $preciofinal;
            
        }

    

    public function hayPasajesDisponible(){

        $hayLugar = false;

        $cantidadMaxPasajeros =$this->getCantMaximaPasajerosViaje();
        $coleccionPasajeros = $this->getColPasajeros();
        

        if (count($coleccionPasajeros)<$cantidadMaxPasajeros){

            $hayLugar = true;

        }

        return $hayLugar;

    }


    }
