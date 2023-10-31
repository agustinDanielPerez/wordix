<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Perez, Agustin. FAI-3784. TUDW. agustin.perez@est.fi.uncoma.edu.ar. agustinDanielPerez */
/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PATOS", "AUTOS", "MESSI", "MOTOS", "DADOS"
    ];

    return ($coleccionPalabras);
}
/**
 * carga nuevas palabras
 * @param string $nuevaPalabra
 * @param array $coleccionPalabras
 * @return array
 */
function cargarNuevaPalabra($coleccionPalabras, $Palabra){
    /*int $indice*/
    $indice = count($coleccionPalabras);
    $coleccionPalabras[$indice]= $Palabra;
    return($coleccionPalabras);
}
/**
 * este modulo tiene cargadas distintas partidas de distintos jugadores
 * @return array
 */
function cargarPartidas(){
    $partida1=["palabraWordix" => "QUESO", "jugador" => "agustin", "intentos" => 6, "puntaje" => 9];
    $partida2=["palabraWordix" => "FUEGO", "jugador" => "marcos", "intentos" => 2, "puntaje" => 9];
    $partida3=["palabraWordix" => "DADOS", "jugador" => "pink floyd", "intentos" => 5, "puntaje" => 11];
    $partida4=["palabraWordix" => "FUEGO", "jugador" => "agustin", "intentos" => 3, "puntaje" => 9];
    $partida5=["palabraWordix" => "MELON", "jugador" => "periko", "intentos" => 1, "puntaje" => 15];
    $partida6=["palabraWordix" => "PIANO", "jugador" => "periko", "intentos" => 6, "puntaje" => 8];
    $partida7=["palabraWordix" => "HUEVO", "jugador" => "marcos", "intentos" => 4, "puntaje" => 12];
    $partida8=["palabraWordix" => "YUYOS", "jugador" => "karina", "intentos" => 1, "puntaje" => 17];
    $partida9=["palabraWordix" => "RASGO", "jugador" => "ruperto", "intentos" => 5, "puntaje" => 12];
    $partida10=["palabraWordix" => "MUJER", "jugador" => "lauuu", "intentos" => 1, "puntaje" => 15];
    $partida11=["palabraWordix" => "MUJER", "jugador" => "agustin", "puntaje" => 0];
    $partidasGuardadas = [$partida1, $partida2, $partida3, $partida4, $partida5, $partida6, $partida7, $partida8, $partida9, $partida10, $partida11];
    return($partidasGuardadas);
}
/**
 * este modulo meustra las opciones del menu
 * @return int
 */
function seleccionarOpcion(){
    /*int $opcionElegida*/
    echo "\n¿Que quiere hacer? \n";
    echo "1) Jugar al wordix con una palabra elegida:\n";
    echo "2) Jugar al wordix con una palabra aleatoria:\n";
    echo "3) Mostrar una partida:\n";
    echo "4) Mostrar la primer partida ganadora:\n";
    echo "5) Mostrar resumen de jugador:\n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra:\n";
    echo "7) Agregar una palabra de 5 letras a wordix:\n";
    echo "8) Salir\n";
    echo "Ingrese opcion: ";
    $opcionElegida = trim(fgets(STDIN));
    return($opcionElegida);
}
/**
 * este modulo dado un numero muestra una partida
 * @param int $numero
 * @param array $partidasGuardadas
 */
function datosPartida($partidasGuardadas,$numero){
    echo "**********************************************************\n";
    echo "Partida wordix ".$numero.": palabra ".$partidasGuardadas[$numero-1]["palabraWordix"]."\n";
    echo "Jugador: ".$partidasGuardadas[$numero-1]["jugador"]."\n";
    echo "Puntos: ".$partidasGuardadas[$numero-1]["puntaje"]."\n";
    if($partidasGuardadas[$numero-1]["puntaje"]==0){
        echo "No adivino la palabra\n";
    }else{
        echo"Adivino la palabra en ".$partidasGuardadas[$numero-1]["intentos"]." intentos\n";
    }
    echo "**********************************************************";
}
/**
 * este modulo retorna el indice de la primer partida ganada por un jugador
 * @param string $nombreJugador
 * @param array $partidasGuardadas
 * @return int 
 */
function partidasGanadas($partidasGuardadas, $nombreJugador){
    

}
/**
 * este modulo solicita al usuario el nombre de un jugador y retorna el nombre
 * en minusculas
 *@return string
*/
function solicitarJugador(){

}

/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);




do {
   $opcion = seleccionarOpcion();

    switch ($opcion) { //estructura de control alternativa switch, sirve para desarollar una rama de opciones dependiendo de un valor que haya ingresado el usuario
        case 1: 
            echo "Ingrese su nombre de usuario:\n";
            $nombreUsuario = trim(fgets(STDIN));
            echo "Ingrese un numero para la palabra:";
            $numPalabra = trim(fgets(STDIN));
            break;
        case 2: 
            echo "Ingrese su nombre de usuario:\n";
            $nombreUsuario = trim(fgets(STDIN));
            
            break;
        case 3: 
            do{
                echo "Ingrese el numero de la partida:";
                $numeroPartida = trim(fgets(STDIN));
                $partidasGuardadas = cargarPartidas();
                if(($numeroPartida<=count($partidasGuardadas)&&($numeroPartida>=1))){
                    datosPartida($partidasGuardadas,$numeroPartida);
                }else{
                    echo"No existe el numero de partida, vuelve a intentarlo.\n";
                }
            }while(($numeroPartida>count($partidasGuardadas)||($numeroPartida<1)));
           
            break;
        case 4:

            break;

        case 5: 

            break;
        case 6: 

            break;
        case 7: 
            $nuevaPalabra = leerPalabra5Letras();
            $coleccionPalabras = cargarColeccionPalabras();
            $coleccionPalabras = cargarNuevaPalabra($coleccionPalabras, $nuevaPalabra); 
            echo "Ya agregaste una nueva palabra, vuelve al menu para jugar.";
            break;
        default: 
        if($opcion != 8){
            echo "Opcion incorrecta, vuelve a intentarlo.";
    }   }
        
} while ($opcion != 8);

