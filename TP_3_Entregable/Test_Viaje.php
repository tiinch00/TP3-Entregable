<?php


include_once('Pasajero.php');
include_once('PasajeroVIP.php');
include_once('PasajeroEspecial.php');
include_once('Viaje.php');



function seleccionarOpcion(){

    do{
        echo "\n\n";
        echo "Menú de opciones:\n";
        echo "1) ingresar pasajero normal\n";
        echo "2) ingresar pasajero especial\n";
        echo "3) ingresar pasajero VIP \n";
        echo "4) ver datos de viaje \n";
        echo "5) Salir\n";
        echo "Ingrese su opción: ";
        $opcion = trim(fgets(STDIN));

        $opcionValida = false;
        if($opcion >= 1 && $opcion <= 5){
            $opcionValida = true; 
        } else{
            echo("Por favor, seleccione una opcion valida (1 al 5)");
        }
    }while($opcionValida = false);
    return $opcion;
}

//PROGRAMA PRINCIPAL

//datos del viaje
echo "ingrese costo de viaje: ";
$costoViaje=trim(fgets(STDIN));
echo "ingrese la cantidad de asientos: ";
$cantidadAsientosDisponibles=trim(fgets(STDIN));

//objetos


$viaje = new Viaje(001, "El chocon",$cantidadAsientosDisponibles, [],"Martin", $costoViaje, 10);


do{
$opcion = seleccionarOpcion();
switch ($opcion){
    case 1:
        $hayPasaje=$viaje->hayPasajesDisponible();
        if($hayPasaje){
        echo "Ingrese el nombre del pasajero: ";
        $nombrePasajero=trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $asiento=trim(fgets(STDIN));
        echo "Ingrese el numero de ticket: ";
        $numeroTicket=trim(fgets(STDIN));
        $objPasajero=new Pasajero($nombrePasajero,$asiento,$numeroTicket);
        $precioViaje=$viaje->venderPasaje($objPasajero);
        echo "el precio del pasaje es de: ".$precioViaje ."\n";
        }else{
            echo "no hay asientos disponibles en el viaje";
        }

    break;

    case 2:
        $hayPasaje=$viaje->hayPasajesDisponible();
        if($hayPasaje){
        echo "Ingrese el nombre del pasajero: ";
        $nombrePasajero=trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $asiento=trim(fgets(STDIN));
        echo "Ingrese el numero de ticket: ";
        $numeroTicket=trim(fgets(STDIN));

        echo "¿el pasajero necesita silla ed ruedas?: Si=1 , No=2  ";
        $silla=trim(fgets(STDIN));
        echo "¿el pasajero necesita asistencia para subir al micro?: Si=1 , No=2 ";
        $asis=trim(fgets(STDIN));
        echo "¿el pasajero necesita comida especial?: Si=1 , No=2 ";
        $comida=trim(fgets(STDIN));

       $objPasajero=new PasajeroEspecial($nombrePasajero,$asiento,$numeroTicket,$silla,$asis,$comida);
       $precioViaje=$viaje->venderPasaje($objPasajero);
       echo "el precio del pasaje es de: ".$precioViaje ." pesos";
       }else{
        echo "no hay mas asientos en el viaje";}

    break;   

    case 3:
        $hayPasaje=$viaje->hayPasajesDisponible();
        if($hayPasaje){
        echo "Ingrese el nombre del pasajero: ";
        $nombrePasajero=trim(fgets(STDIN));
        echo "Ingrese el numero de asiento: ";
        $asiento=trim(fgets(STDIN));
        echo "Ingrese el numero de ticket: ";
        $numeroTicket=trim(fgets(STDIN));

        echo "Ingrese viajes frecuentes: ";
        $viajeFrecuente=trim(fgets(STDIN));
        echo "Ingrese las millas: ";
        $millas=trim(fgets(STDIN));

       $objPasajero=new PasajeroVIP($nombrePasajero,$asiento,$nroTicketPasaje,$viajeFrecuente,$millas);
       $precioViaje=$viaje->venderPasaje($objPasajero);
       echo "el precio del pasaje es de: ".$precioViaje ." pesos";
       }else{
        echo "no hay mas asientos en el viaje";
       }

    break;  


    case 4:
        echo $viaje;
    break;  


}
}while($opcion!= 5);
