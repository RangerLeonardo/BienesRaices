<?php

define("TEMPLATES_URL", __DIR__."/templates");
define("FUNCIONES_URL", __DIR__."funciones.php");
define("CARPETA_IMAGENES",$_SERVER["DOCUMENT_ROOT"]."/imagenes/");




    function incluirTemplate(string $nombre, bool $inicio=false){
        include TEMPLATES_URL."/${nombre}.php";
    }

function estaAutenticado() : bool {
    session_start();
    

    if(!$_SESSION["login"]){
        
        header("Location: /");
        return false;
    }

        return true ;
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//escapando el html para sanitizar el input 
function s($html):string{
    $s=htmlspecialchars(($html));
    return $s;
}

//Validar el tipo de contenido
function validarTipoContenido($tipo){
    $tipos=["vendedor","propiedad"];


    return in_array($tipo,$tipos);
}

//Muestra los mensajes haciendo referencia al vendedor o a la propiedad
    function mostrarNotificacion($codigo){
        $mensaje="";

        switch($codigo){
            case 1:
                $mensaje="Creado Correctamente";
                break;
            case 2:
                $mensaje="ACTUALIZADO Correctamente";
                break;
            case 3:
                $mensaje="Eliminado Correctamente";
                break;    

                default:
                $mensaje=false;
                break;  
                      
        }
        return $mensaje;
        
    }

    function validarORedireccionar(string $url){
        //validar que sea un id valido
        $idActualizar=$_GET["id"];
        $idFiltro=filter_var($idActualizar,FILTER_VALIDATE_INT);
        if (!$idFiltro){
            header("Location: ${url}");
        }
    
        return $idFiltro;
    
    }
            

?>