<?php
namespace Model;
use Model\ActiveRecord;

class tipo extends ActiveRecord{

    protected static $tabla = 'tipos';
    protected static $columasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
    public function __construct($args = [])//arreglo vacio
    {
        $this-> id = $args['id'] ?? ''; 
        $this->nombre = $args['nombre'] ?? '';       
    }

    public function validar(){
        //insercion de mensajes al campo vacio
        if(!$this->nombre){
            self::$errores[]="debes añadir un nombre";
        }         

        return self::$errores;
    }

}