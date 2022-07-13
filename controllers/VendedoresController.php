<?php
namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedoresController{
    public static function crear(Router $router){

        $errores=Vendedor::getErrores();

        $vendedor=new Vendedor;

        if ($_SERVER["REQUEST_METHOD"]==="POST"){

            $vendedor =new Vendedor($_POST["vendedor"]);
        
           $errores=$vendedor->validar();
        
           //No hay errores
           if(empty($errores)){
               $vendedor->guardar(); 
           }
        }



        $router->render("vendedores/crear",[
            "errores"=>$errores,
            "vendedor"=>$vendedor

        ]);
    }

    public static function actualizar(Router $router){

        $errores=Vendedor::getErrores();
        $id=validarORedireccionar("/admin");

        //obtener datos del vendedor en actualizar
        $vendedor=Vendedor::find($id);

        if ($_SERVER["REQUEST_METHOD"]==="POST"){
            //Asignando los valores
            $args=$_POST["vendedor"];
            //Sincronizar objeto en memoria con lo que el usuario escribió
            $vendedor->sincronizar($args);
        
            //validacion 
            $errores=$vendedor->validar();
        
            if(empty($errores)){
                $vendedor->guardar();
            }

        }

        

        $router->render("vendedores/actualizar", [
            "errores"=>$errores,
            "vendedor"=>$vendedor
        ]);
        
        



    }

    public static function eliminar(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            
            //valida el id
            $id=$_POST["id"];
            $id=filter_var($id, FILTER_VALIDATE_INT);

            IF($id){
              //valida el tipo a eliminar
              $tipo=$_POST["tipo"];

              if(validarTipoContenido($tipo)){
                  $vendedor=Vendedor::find($id);
                  $vendedor->eliminar();
              }
            }

        }

    }
}