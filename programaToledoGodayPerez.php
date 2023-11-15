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

/**Explicación 3 Punto 1
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

/**Explicación 3 Punto 2
 * Este módulo carga distintas partidas de distintos jugadores
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
    $partida11=["palabraWordix" => "MUJER", "jugador" => "laura", "intentos" => 0, "puntaje" => 0];
    $partidasGuardadas = [$partida1, $partida2, $partida3, $partida4, $partida5, $partida6, $partida7, $partida8, $partida9, $partida10, $partida11];
    return($partidasGuardadas);
}
/**Explicación 3 Punto 3
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
    return($opcionElegida);
}

/**Explicación 3 Punto 6
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

/**Explicación 3 Punto 7
 * Carga nuevas palabras
 * @param string $nuevaPalabra
 * @param array $coleccionPalabras
 * @return array
 */
function agregarPalabra($coleccionPalabras, $palabra){
    array_push($coleccionPalabras, $palabra);
    return($coleccionPalabras);
}

/**Explicacion 3 Punto 8
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

/**Explicación 3 Punto 10
 *Este módulo solicita al usuario el nombre de un jugador y retorna el nombre en minusculas
 *@return string
*/
function solicitarJugador(){
    //string $nombre, nombreMinuscula, boolean $verificacionPalabra   
    do{
        $verificacionPalabra = true;
        echo "Ingrese el nombre de un jugador, el primer caracter debe ser una letra: ";                 
        $nombre = trim(fgets(STDIN));
        if ($nombre[0] > "a" && $nombre[0] < "z" || $nombre[0] > "A" && $nombre[0] < "z"){
            $nombreMinuscula = strtolower($nombre);
        }else{
            echo "El primer caracter no es una letra\n";
            $verificacionPalabra = false;
        }
    }while(!$verificacionPalabra);
    return $nombreMinuscula;
}

/**Explicación 3 Punto 11
 *Este módulo dada una colección de partidas, muestra las partidas ordenadas por el nombre del jugador y por la palabra.
 */
function mostrarPartidasOrdenadas($partidas){
    uasort($partidas,'auxAusort');   
    print_r($partidas);
}

/**
 * Este modulo dado un nombre y un array, verifica si el nombre esta dentro del array
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
 *Este módulo es la función auxiliar que ordena para que la función uasort pueda ser utilizada 
 *@param array $partida1 
 *@param array $partida2 
 *@return int
*/
function auxAusort($partida1, $partida2){
    if ($partida1["jugador"] == $partida2["jugador"]) {
        if ($partida1["palabraWordix"] == $partida2["palabraWordix"]) {
           $orden = 0;
        } elseif ($partida1 ["palabraWordix"] < $partida2["palabraWordix"]) {               
            $orden = -1; 
        } else {
            $orden = 1; 
        }
    } elseif ($partida1["jugador"] < $partida2["jugador"]) {
            $orden = -1; 
    }  else {
         $orden = 1; 
}
return $orden;
}

/**
 * Este modulo cargar un resumen de un jugador dado un nombre
 * y un arreglo de partidas
 * @param array $arregloPartidas
 * @param string $usuario
 * @return array
*/
function cargarResumenJugador($arregloPartidas, $usuario){
    /**/
    $resumenJugador = [
        "jugador" => $usuario, "partidas" => 0, "puntaje" => 0, "victorias" => 0, "intento 1" => 0,
        "intento 2" => 0, "intento 3" => 0, "intento 4" => 0, "intento 5" => 0, "intento 6" => 0
    ];
    for($i=0;$i<count($arregloPartidas);$i++){
        if($arregloPartidas[$i]["jugador"] == $usuario){
            $resumenJugador["partidas"] = $resumenJugador["partidas"] + 1;
            if($arregloPartidas[$i]["puntaje"] > 0){
                $resumenJugador["puntaje"] = $resumenJugador["puntaje"] + $arregloPartidas[$i]["puntaje"];
                $resumenJugador["victorias"] = $resumenJugador["victorias"] + 1;
                if($arregloPartidas[$i]["intentos"]==1){
                    $resumenJugador["intento 1"] = $resumenJugador["intento 1"] + 1;
                }elseif($arregloPartidas[$i]["intentos"]==2){
                    $resumenJugador["intento 2"] = $resumenJugador["intento 2"] + 1;
                }elseif($arregloPartidas[$i]["intentos"]==3){
                    $resumenJugador["intento 3"] = $resumenJugador["intento 3"] + 1;
                }elseif($arregloPartidas[$i]["intentos"]==4){
                    $resumenJugador["intento 4"] = $resumenJugador["intento 4"] + 1;
                }elseif($arregloPartidas[$i]["intentos"]==5){
                    $resumenJugador["intento 5"] = $resumenJugador["intento 5"] + 1;
                }elseif($arregloPartidas[$i]["intentos"]==6){
                    $resumenJugador["intento 6"] = $resumenJugador["intento 6"] + 1;
                } 
            }
        }
    }
    return $resumenJugador;
}

/**
 * Este modulo muestra un cartel con las estadisitcas de un jugador
 * @param array $arregloPartidas
 * @param string $usuario
*/
function estadisticasJugador($arregloPartidas, $usuario){
    /**/
    $resumenJugador = cargarResumenJugador($arregloPartidas, $usuario);
    echo "******************************************************\n";
    echo "Jugador: ".$resumenJugador["jugador"]."\n";
    echo "Partidas: ".$resumenJugador["partidas"]."\n";
    echo "Puntaje Total: ".$resumenJugador["puntaje"]."\n";
    echo "Victorias: ".$resumenJugador["victorias"]."\n";
    echo "Porcentaje Victorias: ".(($resumenJugador["victorias"]/$resumenJugador["partidas"])*100)."%\n";
    echo "Adivinadas: \n";
    echo "      Intento 1: ".$resumenJugador["intento 1"];
    echo "\n      Intento 2: ".$resumenJugador["intento 2"];
    echo "\n      Intento 3: ".$resumenJugador["intento 3"];
    echo "\n      Intento 4: ".$resumenJugador["intento 4"];
    echo "\n      Intento 5: ".$resumenJugador["intento 5"];
    echo "\n      Intento 6: ".$resumenJugador["intento 6"];
    echo "\n******************************************************\n";
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
/*string $nombreUsuario, array $partidaJugada, array $coleccionPalabras, array $coleccionPartidas
boolean $seguir, int $numPalabra int $opcion, string $palabraAJugar, boolean $usoPalabra, int $indice
boolean $existeNombre, int $indicePartidadGanada, boolean $verificacionNombre*/

//Inicialización de variables:
$partidaJugada = [];
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();
//Proceso:
do {
   $opcion = seleccionarOpcion();
    switch ($opcion) { //estructura de control alternativa switch, sirve para desarollar una rama de opciones dependiendo de un valor que haya ingresado el usuario
        case 1:     
            $nombreUsuario = solicitarJugador();
            $seguir = false;
            do{
                echo "Ingrese un numero de palabra para jugar:";
                $numPalabra = trim(fgets(STDIN));
                $numPalabra = (int)($numPalabra);
                if(($numPalabra<count($coleccionPalabras))&&($numPalabra >= 0)){
                    $usoPalabra = verificarNumeroPalabra($coleccionPalabras, $coleccionPartidas, $numPalabra, $nombreUsuario);
                    if(!$usoPalabra){
                        $palabraAJugar = $coleccionPalabras[$numPalabra-1];
                        $partidaJugada = jugarWordix($palabraAJugar, $nombreUsuario);
                        array_push($coleccionPartidas,$partidaJugada);
                        echo "\nDesea seguir jugando? S/N: ";
                        $respuesta = trim(fgets(STDIN));
                        if($respuesta=="N" || $respuesta=="n"){
                            $seguir = true;
                        }
                    }else{
                        echo $nombreUsuario." ya usaste la palabra, elige otra.\n";
                    }
                }else{
                    echo "No existe la palabra, vuelve a intentarlo.\n";
                }
            }while(!$seguir);
            break;
        case 2: 
            $nombreUsuario = solicitarJugador();
            $seguir = true;
            $indice = 0;
            do{ 
                if(!verificarNumeroPalabra($coleccionPalabras, $coleccionPartidas, $indice+1, $nombreUsuario)){
                    $palabraAJugar = $coleccionPalabras[$indice];
                    $partidaJugada = jugarWordix($palabraAJugar, $nombreUsuario);
                    array_push($coleccionPartidas,$partidaJugada);
                    $seguir = false;
                }else{
                    $indice++;
                }
            }while($seguir && $indice < count($coleccionPalabras));
            break;  
        case 3: 
            do{
                echo "Ingrese el numero de la partida:";
                $numeroPartida = trim(fgets(STDIN));
                $numeroPartida = (int)($numeroPartida);
                if(($numeroPartida<=count($coleccionPartidas)&&($numeroPartida>=1))){
                    datosPartida($coleccionPartidas,$numeroPartida);
                }else{
                    echo"No existe el numero de partida, vuelve a intentarlo.\n";
                }
            }while(($numeroPartida>count($coleccionPartidas)||($numeroPartida<1)));
           
            break;
        case 4:
            do{
                $nombreUsuario = solicitarJugador();
                $existeNombre = verExistenciaNombre($coleccionPartidas,$nombreUsuario);
                if($existeNombre){
                   $indicePartidadGanada = primerPartidaGanada($coleccionPartidas, $nombreUsuario); 
                    if($indicePartidadGanada == -1){
                        echo "El jugador ".$nombreJugador." no gano ninguna partida";
                    }else{
                    echo "**********************************************************\n";
                    echo "Partida WORDIX ".$indicePartidadGanada.": palabra ".$coleccionPartidas[$indicePartidadGanada-1]["palabraWordix"]."\n";
                    echo "Jugador: ".$coleccionPartidas[$indicePartidadGanada-1]["jugador"]."\n";
                    echo "Puntos: ".$coleccionPartidas[$indicePartidadGanada-1]["puntaje"]."\n";
                    echo"Intento: Adivinó la palabra en ".$coleccionPartidas[$indicePartidadGanada-1]["intentos"]." intentos\n";
                    echo "**********************************************************";
                    }    
                }else{
                    echo "Nombre inexistente, vuelva a intentarlo.\n";
                }    
            
            }while(!$existeNombre);
            break;

        case 5: 
            do{
                $seguir = true;
                $nombreUsuario = solicitarJugador();
                $verificacionNombre = verExistenciaNombre($coleccionPartidas, $nombreUsuario);
                if($verificacionNombre){
                    estadisticasJugador($coleccionPartidas, $nombreUsuario);
                    $seguir = false;
                }else{
                    echo "Ingrese un nombre correcto.\n";
                }
            }while($seguir);
            break;
        case 6: 
            mostrarPartidasOrdenadas($coleccionPartidas);
            break;
        case 7: 
            $palabraAJugar = leerPalabra5Letras();
            $coleccionPalabras = cargarColeccionPalabras();
            $coleccionPalabras = array_push($coleccionPalabras,$palabraAJugar);
            break;
        default: 
        if($opcion != 8){
            echo "Opcion incorrecta, vuelve a intentarlo.";
    }   }
        
} while ($opcion != 8);

