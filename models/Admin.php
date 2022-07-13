<?php
namespace Model;

class Admin extends ActiveRecord{
    //base de datos login
    protected static $tabla="usuarios";
    protected static $columnasDB=["id","email","password"];

    public $id;
    public $email;
    public $password;

    public function __construct($args=[])
    {
        $this->id = $args["id"] ?? null;
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";

    }

    public function validar() {
        if(!$this->email) {
            self::$errores[] ="El Correo es Obligatorio";
        }
        if(!$this->password) {
            self::$errores[] ="La Contraseña es Obligatoria";
        }
        return self::$errores;
    }


    public function existeUsuario(){
        //Revisar si un usuario existe o no
        $query="SELECT * FROM ". self::$tabla." WHERE email= '".$this->email."' LIMIT 1";

        $resultado=self::$db->query($query);

        if(!$resultado->num_rows){
            self::$errores[]="El usuario no existe";
            return;
        }
        return $resultado;
    }
    public function comprobarPassword($resultado){
        $usuario=$resultado->fetch_object();

        //nos dice si un password que estamos metiendo  es correcto, porque está hasheado
        //toma dos parametros el primero es el password a comparar y el segundo es el de la base de datos

            //lo que escribió el usuario   //lo que está hasheado     
        $autenticado=password_verify($this->password,$usuario->password);

        if(!$autenticado){
            self::$errores[]= "La contraseña es incorrecta";
        }
        return $autenticado;
    }

    public function autenticar(){
        session_start();
        //LLenar el arreglo de sesión
        $_SESSION["usuario"]=$this->email;
        $_SESSION["login"]=true;

        header("Location: /admin");

    }

}