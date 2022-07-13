<?php 
namespace Model;

class ActiveRecord{
    protected static $db;
    protected static $columnasDB=[];
    protected static $tabla="";
    //errores
    protected static $errores=[];

        //definir la conexión a la base de datos db
        public static function setDB($database){
            self::$db=$database;
        }
        
   

        //revisa si ex  isten datos previos, si existen es actualizar, si no, se están insertando datos nuevos
        public function guardar(){
            if (!is_null($this->id)){
                //actualizando
                $this->actualizar();
            }
            else{
                $this->crear(); 

            }
    }


    //insertar nuevos datos
    public function crear (){
        //sanitizar los datos
        $atributos=$this->sanitizarAtributos();
        //lo que hace join es que un arreglo lo pasa a string, por ejemplo si tienes datos enteros, esto los hace string
        //INSERTAR EN LA BASE DE DATOS 
        $query=" INSERT INTO ".static::$tabla. " ( ";
        $query .= join(", ", array_keys($atributos));
        $query .=  " ) VALUES (' "; 
        $query .= join("', '",array_values($atributos)); 
        $query .= " ') ";

        $resultado=self::$db->query($query);
 
        if($resultado){ //mensaje de exito
            //solo se puede poner este header antes de cualquier código html, si lo pones después de que inicia el código marca error
        header("location: /admin?resultado=1");
    }

    }

    public function actualizar(){
    
        $atributos=$this->sanitizarAtributos();
        $valores=[];
        foreach($atributos as $key=>$value){
            $valores[]="{$key}='{$value}' ";
        }   
    
        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 
        
        $resultado=self::$db->query ($query);
        if($resultado){
        header("location: /admin?resultado=2");
    }
    }

    public function eliminar(){
         //ELIMINA LA PROPIEDAD 
         $query= "DELETE FROM " .static::$tabla. " WHERE id= ".self::$db->escape_string($this->id) . " LIMIT 1";
         $resultado=self::$db->query($query); 
         if ($resultado){
             $this->borrarImagen();
            header("location: /admin?resultado=3");
        }
    }







    //este itera sobre cada columna, los identifica y une los atributos de la BD
    public function atributos(){
        $atributos=[];
        foreach(static::$columnasDB as $columna){
            if($columna==="id")continue;
            $atributos[$columna]=$this-> $columna;
            
        }
        return $atributos;
    }
    //este los sanitiza
    public function sanitizarAtributos(){
        $atributos=$this->atributos();
        $sanitizado=[];
        //key muestra el titulo, precio, imagen, descripcion
        //value, muestra el titulo que le dimos, el precio que le dimos y la imagen que pusimos
        foreach($atributos as $key=>$value){
            //escape_string es la forma en que se sanitiza con POO
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

            //validacion
            public static function getErrores(){
                return static::$errores;
                }
            // return $errores;
    
    


    //Subida de archivos
    public function setImagen($imagen){
        //elimina la imagen en actualizar si hay una nueva
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        //asignar el atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen=$imagen;
        }
    }

    //Elimina el archivo
    public function borrarImagen(){
        $existeImagen=file_exists(CARPETA_IMAGENES.$this->imagen);
            
        if($existeImagen){
            unlink(CARPETA_IMAGENES.$this->imagen ); 
        }

    }

    public function validar(){
        static::$errores=[]; 
        return static::$errores;
    }

    //Lista todas las propiedades

    public static function all(){
        $query="SELECT * FROM ". static::$tabla;

        $resultado=self::consultarSQL($query);

        return $resultado;

    }

    //pone un limite a cuantos anuncios mostrar
    public static function limite($cantidad){
        $query="SELECT * FROM ". static::$tabla." LIMIT ". $cantidad;

        $resultado=self::consultarSQL($query);

        return $resultado;

    }



    //Busca una propiedad por su id 
    public static function find($id){
        $query="SELECT * FROM ".static::$tabla." WHERE id = ${id}";
        $resultado =self::consultarSQL($query);
        return (array_shift ($resultado));

    }



    public static function consultarSQL($query){
        //consultar la base de datos
        $resultado=self::$db->query($query);


        //iterar los resultados
        $array=[];
        while($registro=$resultado->fetch_assoc()){
            $array[]=static::crearObjeto($registro);
        }

        //liberar la memoria
        $resultado->free();


        //retornar los resultados
        return $array;


    }

    protected static function crearObjeto ($registro){
            $objeto=new static;

            foreach($registro as $key=>$value){
                if (property_exists($objeto, $key)){
                    $objeto->$key=$value;
                }
            }
            return $objeto;
    }


    //sincronizar el objeto  en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
            foreach($args as $key=>$value){
                if(property_exists($this,$key) && !is_null($value)){
                    $this->$key=$value; 
                }
            }

    }

}