<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{
    public static function index(Router $router){

        $propiedades=Propiedad::all();
        $vendedores=Vendedor::all();

        $resultado=$_GET["resultado"] ?? null;


        $router->render("propiedades/admin",[
            "propiedades"=>$propiedades,
            "resultado"=>$resultado,
            "vendedores"=>$vendedores

        ]);
    }

    // -------------------------------------------

    public static function crear(Router $router){

        $propiedad=new Propiedad;

        $vendedores=Vendedor::all();

        //arreglo con mensajes de errores
        $errores=Propiedad::getErrores();

      
            if ($_SERVER["REQUEST_METHOD"]==="POST"){
                //crea una nueva instancia
                $propiedad=new Propiedad($_POST["propiedad"]) ;
            
                //ponerle un nombre exótico a cada archivo que se sube para que no se reenombren loarchivos y borren
                $nombreImagen=md5(uniqid(rand(),true)).".jpg";
            
            
                //Realizar un resize a la imagen con la libreria Intervention
                
                 if($_FILES ["propiedad"] ['tmp_name']['imagen'] ){
                     //setear la imagen
                     $image = Image::make($_FILES ["propiedad"] ['tmp_name']['imagen'])->fit(800,600);
                     $propiedad->setImagen($nombreImagen);
                }

                     
                //validar que no tenga errores
                $errores= $propiedad->validar ();
                if (empty($errores)){
                    //CREANDO LA CARPETA donde se van a guardar las img
                    if(!is_dir(CARPETA_IMAGENES)){
                        mkdir(CARPETA_IMAGENES);
                    }
                    //*-------------subida de archivos------------ *//
                        //guardando la imagen en el servidor
                        $image->save(CARPETA_IMAGENES.$nombreImagen);
                    //guardando en la base de datos
            
                    $propiedad->guardar();
          }
         }
        


        $router->render("propiedades/crear",[
            "propiedad"=>$propiedad,
            "vendedores"=>$vendedores,
            "errores"=>$errores
        ]);     
    }

    // -------------------------------------------

    public static function actualizar(Router $router){
        
        $id=validarORedireccionar("/admin");
        $vendedores=Vendedor::all();
        $propiedad=Propiedad::find(($id));
        $errores=Propiedad::getErrores();


        if ($_SERVER["REQUEST_METHOD"]==="POST"){

            //Asignar los  atributos
            $args=$_POST["propiedad"];
        
        
            $propiedad->sincronizar($args);
            
            //validación
            $errores=$propiedad->validar();
            //subida de archivos
              
            $nombreImagen=md5(uniqid(rand(),true)).".jpg";
        
            if($_FILES ["propiedad"] ['tmp_name']['imagen']){
                //setear la imagen
                $image = Image::make($_FILES ["propiedad"] ['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);
           }
        
        
            if (empty($errores)){
            if($_FILES ["propiedad"] ['tmp_name']['imagen']){
                
                $image->save(CARPETA_IMAGENES.$nombreImagen);
                    $propiedad->guardar();
            }    
        
            }
        
            $resultado=$propiedad->guardar();
        
        }
        




        $router->render("/propiedades/actualizar",[
            "propiedad"=>$propiedad,
            "vendedores"=>$vendedores,
            "errores"=>$errores

        ]);
    }

    public static function eliminar(){
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $id=$_POST["id"];
            $id=filter_var($id, FILTER_VALIDATE_INT);
        
            if ($id){
                $tipo=$_POST["tipo"];
                if(validarTipoContenido($tipo)){
                    //Compara lo que vamos a eliminar
                    $propiedad=Propiedad::find($id);
                    $propiedad->eliminar();
       }
      }
     }
    }

}