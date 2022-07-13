<?php

namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla="propiedades";
    protected static $columnasDB=["id","titulo","precio","imagen","descripcion","habitaciones","wc","estacionamiento","creado","vendedorId"];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args=[])
    {
        $this->id=$args["id"] ?? null;
        $this->titulo=$args["titulo"] ?? "";
        $this->precio=$args["precio"] ?? "";
        $this->imagen=$args["imagen"] ?? "";
        $this->descripcion=$args["descripcion"] ?? "";
        $this->habitaciones=$args["habitaciones"] ?? "";
        $this->wc=$args["wc"] ?? "";
        $this->estacionamiento=$args["estacionamiento"] ?? "";
        $this->creado=date("Y/m/d")?? "";
        $this->vendedorId=$args["vendedorId"] ?? "";
    }


    public function validar(){
        if(!$this->titulo){
            self::$errores []="Debes añadir un titulo";
        }

        if(!$this->precio){
            self::$errores []="Debes añadir un precio";
        }

        //strlen es para saber cuntos caracteres tiene un archivo
        if( strlen ($this->descripcion) < 30 ){
            self::$errores []="Debes añadir una descripción de al menos 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores []="Debes añadir con cuantas habitaciones cuenta";
        }
        if(!$this->wc){
            self::$errores []="Debes añadir con cuantos baños cuenta";
        }
        if(!$this->estacionamiento){
            self::$errores []="Debes añadir con cuantos estacionamientos cuenta";
        }
        if(!$this->vendedorId){
            self::$errores []="Debes añadir un Vendedor";

        }
    
        //validar que haya subido un imagen
    
        if(!$this->imagen)   {
            self::$errores []="La imagen es obligatoria";

            
        }
            return self::$errores;
    }
    
}

