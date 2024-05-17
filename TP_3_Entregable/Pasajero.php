<?php 

//La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaj

class Pasajero {


    private $nombrePasajero;
    private $numeroAsiento;
    private $numeroTicketPasaje;

	public function __construct($nombreP ,$nroAsiento, $nroTicketPasaje) {

		$this->nombrePasajero = $nombreP;
		$this->numeroAsiento = $nroAsiento;
		$this->numeroTicketPasaje = $nroTicketPasaje;
	}

	public function getNombrePasajero() {
		return $this->nombrePasajero;
	}

	public function setNombrePasajero($nombreP) {
		$this->nombrePasajero = $nombreP;
	}

	public function getNumeroAsiento() {
		return $this->numeroAsiento;
	}

	public function setNumeroAsiento($nroAsiento) {
		$this->numeroAsiento = $nroAsiento;
	}

	public function getNumeroTicketPasaje() {
		return $this->numeroTicketPasaje;
	}

	public function setNumeroTicketPasaje($nroTicketPasaje) {
		$this->numeroTicketPasaje = $nroTicketPasaje;
	}

    public function __toString(){
        $cadena = "Nombre Pasajero: " .$this->getNombrePasajero()."\n";
        $cadena .= "Numero asiento: ".$this->getNumeroAsiento()."\n";
        $cadena .= "Numero de ticket: ".$this->getNumeroTicketPasaje()."\n";

        return $cadena;
    }

    public function darPorcentajeIncremento(){
		
		$porcentaje = 0.10;
       
		return $porcentaje;
    }
}