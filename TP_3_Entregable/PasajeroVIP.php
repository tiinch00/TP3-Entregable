<?php

include_once "Pasajero.php";

//el número de viajero frecuente y cantidad de millas de pasajero

class PasajeroVIP extends Pasajero{

    private $numeroViajeroFrecuente;
    private $cantidadMillas;

	public function __construct($nombreP ,$nroAsiento, $nroTicketPasaje,$nroViajeroFrecuente, $cantMillas) {

        parent :: __construct ($nombreP ,$nroAsiento, $nroTicketPasaje);

		$this->numeroViajeroFrecuente = $nroViajeroFrecuente;
		$this->cantidadMillas = $cantMillas;
	}

	public function getNumeroViajeroFrecuente() {
		return $this->numeroViajeroFrecuente;
	}

	public function setNumeroViajeroFrecuente($nroViajeroFrecuente) {
		$this->numeroViajeroFrecuente = $nroViajeroFrecuente;
	}

	public function getCantidadMillas() {
		return $this->cantidadMillas;
	}

	public function setCantidadMillas($cantMillas) {
		$this->cantidadMillas = $cantMillas;
	}

    public function __toString(){

        $cadena= parent:: __toString();
        $cadena.= "\n". $this->getNumeroViajeroFrecuente()."\n".$this->getCantidadMillas()."\n";
        return $cadena;
    }

	public function darPorcentajeIncremento() {

		$millas = $this->getCantidadMillas();
	
		$porcentaje = 0.35;
	
		if ($millas > 300) { 

			$porcentaje = 0.30;
		}
	
		return $porcentaje;
	}

}