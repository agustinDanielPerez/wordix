<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Perez, Agustin. FAI-3784. TUDW. agustin.perez@est.fi.uncoma.edu.ar. agustinDanielPerez */
/* Perez Toledo, Laura. FAI-5038. TUDW. laura.perez@est.fi.uncoma.edu.ar. lauPerezToledo */
/* Goday, Celina Itati. FAI-5058. TUDW. celina.goday@est.fi.uncoma.edu.ar  celigoday */


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
/**EXPLICACION 3 PUNTO 7
 * Carga nuevas palabras
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
 * Este módulo tiene cargadas distintas partidas de distintos jugadores
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
    $partida11=["palabraWordix" => "MUJER", "jugador" => "agustin", "intentos" => 6, "puntaje" => 0];
    $partidasGuardadas = [$partida1, $partida2, $partida3, $partida4, $partida5, $partida6, $partida7, $partida8, $partida9, $partida10, $partida11];
    return($partidasGuardadas);
}
/**
 * Este módulo muestra las opciones del menú
 * @return int
 */
function seleccionarOpcion(){
    //int $opcionElegida
    echo "\n¿Que quiere hacer? \n";
    echo "1) Jugar al wordix con una palabra elegida:\n";
    echo "2) Jugar al wordix con una palabra aleatoria:\n";
    echo "3) Mostrar una partida:\n";
    echo "4) Mostrar la primer partida ganadora:\n";
    echo "5) Mostrar resumen de jugador:\n";
    echo "6) Mostrar listado de partidas ordenadas por jugador y por palabra:\n";
    echo "7) Agregar una palabra de 5 letras a wordix:\n";
    echo "8) Salir\n";
    echo "Ingrese opción: ";
    $opcionElegida = trim(fgets(STDIN));
    return((int)$opcionElegida);
}
/**EXPLICACION 1 PUNTO 3
 * Este módulo dado un numero muestra una partida
 * @param int $numero
 * @param array $partidasGuardadas
 */
function datosPartida($partidasGuardadas,$numero){
    echo "**********************************************************\n";
    echo "Partida WORDIX ".$numero.": palabra ".$partidasGuardadas[$numero-1]["palabraWordix"]."\n";
    echo "Jugador: ".$partidasGuardadas[$numero-1]["jugador"]."\n";
    echo "Puntaje: ".$partidasGuardadas[$numero-1]["puntaje"]."\n";
    echo "Intento: ";
    if($partidasGuardadas[$numero-1]["puntaje"]==0){
        echo "No adivinó la palabra\n";
    }else{
        echo"Adivinó la palabra en ".$partidasGuardadas[$numero-1]["intentos"]." intentos\n";
    }
    echo "**********************************************************";
}
/**EXPLICACION 1 PUNTO 4 Y EXPLICACION 3 PUNTO 8
 * Este módulo retorna el índice de la primer partida ganada por un determinado jugador
 * @param string $nombreJugador
 * @param array $partidasGuardadas
 * @return int 
 */
function primerPartidaGanada($partidasGuardadas, $nombreJugador){
    //int $encontrada, $i
    $encontrada = false;
    $i = 0;
    while ($encontrada != true){
        if($partidasGuardadas[$i]["jugador"] == $nombreJugador && $partidasGuardadas[$i]["puntaje"] != 0){
            $encontrada = true;
        }
        $i++;
    }
    if ($encontrada == false){
        echo "El jugador ". $partidasGuardadas[$i]["jugador"]. " no ganó ninguna partida";
        return -1;
    }
    else {
        echo "**********************************************************\n";
        echo "Partida WORDIX ".$i.": palabra ".$partidasGuardadas[$i-1]["palabraWordix"]."\n";
        echo "Jugador: ".$partidasGuardadas[$i-1]["jugador"]."\n";
        echo "Puntos: ".$partidasGuardadas[$i-1]["puntaje"]."\n";
        echo"Intento: Adivinó la palabra en ".$partidasGuardadas[$i-1]["intentos"]." intentos\n";
        echo "**********************************************************";
    }
    return $i-1;
}

/**EXPLICACION 3 PUNTO 10
 * Este módulo solicita al usuario el nombre de un jugador y retorna el nombre
 * en minusculas
 *@return string
*/
function solicitarJugador(){
    //string $nombre, nombreMinuscula, boolean $verificacionPalabra
    do{
        $verificacionPalabra = true;
        echo "Ingrese el nombre de un jugador, el primer caracter debe ser una letra): ";                 
        $nombre = trim(fgets(STDIN));
        if ($nombre[0] > "a" && $nombre[0] < "z" || $nombre[0] > "A" && $nombre[0] < "z"){
            $nombreMinuscula = strtolower($nombre);
        }else{
            echo "El primer caracter no es una letra";
            $verificacionPalabra = false;
        }
    }while(!$verificacionPalabra);
    return $nombreMinuscula;
}

/**EXPLICACION 1 PUNTO 7 Y EXPLICACION 3 PUNTO 4
 * Este módulo solicita al usuario una palabra de 5 letras para agregarla al juego y retorna la palabra ingresada
 * @param array $coleccionPalabras
 * @return string
*/
function agregarPalabra($coleccionPalabras){
    //string $palabra
    echo "Ingrese una palabra de 5 letras: ";
    $palabra = trim(fgets(STDIN));
    $palabra = strtoupper($palabra); //Función que convierte el string a mayúsculas
    cargarNuevaPalabra($coleccionPalabras, $palabra);
    return $palabra;
}
/**
 * Este modulo muestra una coleccion de partidas ordenadas por el nombre del jugador
 * y por la palabra
 * @param array $partidasGuardadas
*/
function partidasOrdenadas(){
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

