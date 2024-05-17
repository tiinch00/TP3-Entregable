<?php

include_once "Pasajero.php";

/**pasajeros que pueden requerir servicios especiales como sillas de ruedas, 
 * asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias */


 class PasajerosEspeciales extends Pasajero {

    private $sillaDeRuedas;
    private $asistenciaEmbarqueDesenbarque;
    private $comidasEspeciales;


    public function __construct($nombreP ,$nroAsiento, $nroTicketPasaje,$sillaRuedas,$asistencia,$comidaEspecial){

      parent :: __construct ($nombreP ,$nroAsiento, $nroTicketPasaje);

      $this->sillaDeRuedas = $sillaRuedas;
      $this->asistenciaEmbarqueDesenbarque = $asistencia;
      $this->comidasEspeciales = $comidaEspecial;

    }
    


    

    /**
     * Get the value of sillaDeRuedas
     */
    public function getSillaDeRuedas(){
        return $this->sillaDeRuedas;
    }

    /**
     * Set the value of sillaDeRuedas
     */
    public function setSillaDeRuedas($sillaRuedas){
        $this->sillaDeRuedas = $sillaRuedas;

        
    }

    /**
     * Get the value of asistenciaEmbarqueDesenbarque
     */
    public function getAsistenciaEmbarqueDesenbarque(){
        return $this->asistenciaEmbarqueDesenbarque;
    }

    /**
     * Set the value of asistenciaEmbarqueDesenbarque
     */
    public function setAsistenciaEmbarqueDesenbarque($asistencia){
        $this->asistenciaEmbarqueDesenbarque = $asistencia;

    }

    /**
     * Get the value of comidasEspeciales
     */
    public function getComidasEspeciales(){
        return $this->comidasEspeciales;
    }

    /**
     * Set the value of comidasEspeciales
     */
    public function setComidasEspeciales($comidaEspecial){
        $this->comidasEspeciales = $comidaEspecial;

    }

    public function __toString(){
        $cadena= parent:: __toString();
        $cadena.= "\n". $this->getSillaRuedas() ."\n". $this->getAsistencia()."\n".$this->getComidaEspecial();

        return $cadena;
      }

      /**Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y 
       * comida especial entonces el pasaje tiene un incremento del 30%; 
       * si solo requiere uno de los servicios prestados entonces el incremento es del 15% */

      public function darPorcentajeIncremento(){

         $sillaRuedas=$this->getSillaDeRuedas();
         $asistencia=$this->getAsistenciaEmbarqueDesenbarque();
         $comidaEspecial=$this->getComidasEspeciales();

         $incremento = 0;

        if ($sillaRuedas && $asistencia && $comidaEspecial) {
            $incremento = 0.30;
        } elseif ($sillaRuedas|| $asistencia || $comidaEspecial) {
            $incremento = 0.15;
        }

        return $incremento;
    }

     
 }