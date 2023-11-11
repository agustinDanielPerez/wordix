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
    $partida11=["palabraWordix" => "MUJER", "jugador" => "laura", "intentos" => 6, "puntaje" => 0];
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
    //int $i, boolean $encontrada
    $encontrada = false;
    $i = 0;
    while ($encontrada != true){
        if($partidasGuardadas[$i]["jugador"] == $nombreJugador && $partidasGuardadas[$i]["puntaje"] != 0){
            $encontrada = true;
        }
        $i++;
    }
    if($encontrada == false){
        $i=-1;
    }
    return $i;
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

/**
 * Este modulo dado un nombre y un array, verifica sinombre esta dentro del array
 * @param array $partidas
 * @param string $nombre
 * @return boolean
*/
function verExistenciaNombre($partidas, $nombre){
    /* boolean $esNombre , int $i*/
    $i=0;
    $esNombre = false;
    do{ 
        if($partidas[$i]["jugador"]==$nombre){
            $esNombre = true;
        }else{
            $i++;
        }
    }while((!$esNombre) && ($i < count($partidas)));
    return $esNombre;
}

/**
 * Este modulo dado una coleccion de palabra, una coleccion de partidas y una palabra
 * verifica si el jugador ya jugo con esa palabra
 * @param array $arregloPartidas
 * @param array $arregloPalabras
 * @param int $numeroPalabra
 * @param string $usuario
 * @return boolean
*/
function verificarNumeroPalabra($arregloPalabras, $arregloPartidas, $numeroPalabra, $usuario){
    /*boolean $verPalabra, int $i*/
    $i=0;
    $verPalabra = false;
    do{
        if(($arregloPalabras[$numeroPalabra-1]==$arregloPartidas[$i]["palabraWordix"])&&($arregloPartidas[$i]["jugador"]==$usuario)){
            $verPalabra = true;
        }else{
            $i++;
        }
    }while(!$verPalabra && $i < count($arregloPalabras) && $i < count($arregloPartidas));
    return $verPalabra;
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
$partidaJugada = [];

//Proceso:

//$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);




do {
   $opcion = seleccionarOpcion();

    switch ($opcion) { //estructura de control alternativa switch, sirve para desarollar una rama de opciones dependiendo de un valor que haya ingresado el usuario
        case 1: 
            echo "Ingresar nombre de usuario:";
            $nombreUsuario = trim(fgets(STDIN));
            escribirMensajeBienvenida($nombreUsuario);
            $seguirPreguntando = false;
            do{
                echo "Ingrese un numero de palabra para jugar:";
                $numPalabra = trim(fgets(STDIN));
                $coleccionPalabras = cargarColeccionPalabras();
                $coleccionPartidas = cargarPartidas();
                if($numPalabra<count($coleccionPalabras)){
                    $usoPalabra = verificarNumeroPalabra($coleccionPalabras, $coleccionPartidas, $numPalabra, $nombreUsuario);
                    if(!$usoPalabra){
                        $palabraAJugar = $coleccionPalabras[$numPalabra];
                        $partidaJugada = jugarWordix($palabraAJugar, $nombreUsuario);
                        $cantPartidas = count($coleccionPartidas);
                        $coleccionPartidas[$cantPartidas] = $partidaJugada;
                        $seguirPreguntando = true;
                    }else{
                        echo $nombreUsuario." ya usaste la palabra, elige otra.\n";
                    }
                }else{
                    echo "No existe la palabra, vuelve a intentarlo.\n";
                }
            }while(!$seguirPreguntando);
            break;
        case 2: 
            echo "Ingrese su nombre de usuario:\n";
            $nombreUsuario = trim(fgets(STDIN));
            
            break;
        case 3: 
            do{
                echo "Ingrese el numero de la partida:";
                $numeroPartida = trim(fgets(STDIN));
                $partidas = cargarPartidas();
                if(($numeroPartida<=count($partidas)&&($numeroPartida>=1))){
                    datosPartida($partidas,$numeroPartida);
                }else{
                    echo"No existe el numero de partida, vuelve a intentarlo.\n";
                }
            }while(($numeroPartida>count($partidas)||($numeroPartida<1)));
           
            break;
        case 4:
            do{
                echo "Ingrese el nombre del jugador:";
                $nombreJugador = trim(fgets(STDIN));
                $partidas = cargarPartidas();
                $existeNombre = verExistenciaNombre($partidas,$nombreJugador);
                if($existeNombre){
                   $indicePartidadGanada = primerPartidaGanada($partidas, $nombreJugador); 
                    if($indicePartidadGanada == -1){
                        echo "El jugador ".$nombreJugador." no gano ninguna partida";
                    }else{
                    echo "**********************************************************\n";
                    echo "Partida WORDIX ".$indicePartidadGanada.": palabra ".$partidas[$indicePartidadGanada-1]["palabraWordix"]."\n";
                    echo "Jugador: ".$partidas[$indicePartidadGanada-1]["jugador"]."\n";
                    echo "Puntos: ".$partidas[$indicePartidadGanada-1]["puntaje"]."\n";
                    echo"Intento: Adivinó la palabra en ".$partidas[$indicePartidadGanada-1]["intentos"]." intentos\n";
                    echo "**********************************************************";
                    }    
                }else{
                    echo "Nombre inexistente, vuelva a intentarlo.\n";
                }    
            
            }while(!$existeNombre);
            break;

        case 5: 

            break;
        case 6: 

            break;
        case 7: 
            $palabra = leerPalabra5Letras();
            $coleccionPalabras = cargarColeccionPalabras();
            cargarNuevaPalabra($coleccionPalabras,$palabra);
            break;
        default: 
        if($opcion != 8){
            echo "Opcion incorrecta, vuelve a intentarlo.";
    }   }
        
} while ($opcion != 8);

