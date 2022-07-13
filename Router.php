<?php

namespace MVC;

class Router{
    //son objetos vacios porque se llenan cuando visitamos un página ya sea get o un formulario post
    public $rutasGET=[];
    public $rutasPOST=[];

    //esta función adquiere la url en la que estamos y revisa si es get aparte de eso le pone como segunda variable una función a ejecutar

    public function get($url,$fn){
         $this->rutasGET[$url]=$fn;
    }

    public function post($url,$fn){
      $this->rutasPOST[$url]=$fn;
 }

    //comprueba que estemos en una url que sí exista en caso contrario nos manda un mensaje de "pagina no encontrada"
    public function comprobarRutas(){
      session_start();

      $auth=$_SESSION["login"] ?? null;


      //array para proteger las rutas
      $rutas_protegidas=["/admin", "/propiedades/crear", "/propiedades/actualizar","/propiedades/eliminar","/vendedores/actualizar","/vendedores/crear", "/vendedores/eliminar"];


     $urlActual=$_SERVER["PATH_INFO"] ?? "/";
     $metodo=$_SERVER["REQUEST_METHOD"];

     //proteger las rutas 
     if(in_array($urlActual,$rutas_protegidas) && !$auth){
        header("Location: /");
     }




     //la url dio un metodo de tipo get y esta mandó a llamar a la función
     if ($metodo==="GET"){
       $fn= $this->rutasGET[$urlActual] ?? null;
     }else{
      $fn= $this->rutasPOST[$urlActual] ?? null;
     }


     if($fn){
        //la url existe y tiene un función asignada aunque no sabemos como se llama
        call_user_func($fn,$this);
     }
     else{
         echo "Página no encontrada";
     }
    }

    //Muestra una vista
    public function render($view, $datos=[]){
      foreach($datos as $key => $value){
        $$key=$value;
      }

      //inicia un almacenamiento en memoria
      ob_start();
      include __DIR__."/views/$view.php";

      $contenido= ob_get_clean();

      include __DIR__."/views/layout.php";

    }



}