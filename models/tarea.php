<?php
namespace Model;
use Model\ActiveRecord;

class tarea extends ActiveRecord{
    protected static $tabla = 'tareas';
    protected static $columasDB = ['id','descripcion', 'tipoid', 'estado'];
    public $id;
    public $descripcion;
    public $tipoid;
    public $estado;

    public function __construct($args = [])//arreglo vacio
    
    {
        $this->id = $args['id'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this-> tipoid = $args['tipoid'] ?? '';
        $this-> estado = $args['estado']?? '';
            
    }
     

 
    public function validar(){
        //insercion de mensajes al campo vacio
        if(!$this->descripcion){
            self::$errores[]="debes añadir una descripcion";
        }

        if(!$this->tipoid){
            self::$errores[]="debes añadir un tipo";
        }
        
      

        


        return self::$errores;
    }
   
}