<?php
namespace Model;

use GuzzleHttp\Psr7\Query;

class ActiveRecord {
     //base de datos
     protected  static $db;//no se puede acceder desde el objeto debe ser desde la clase
     protected static $columasDB = [];
     protected static $tabla = ' ';
     protected static $errores = [];
     
 
       //definir la conexion a la BD
       public static function setDB($database){
         self::$db = $database;
     }
 
    


    /* public function guardar(){
         if(!is_null($this->id)){
             //actualiza
             $this->actualizar();
         }else{
             //creando un nuevo registro
             $this->crear();
         }
     }*/
 
     public function crear(){
         //sanatizar
         $atributos = $this->sanatizarDatos();
 
 
          //insertar en la base de datos
       $query = " INSERT INTO ". static::$tabla ." ( ";
       $query .=  join(', ', array_keys($atributos));
       $query .=  " ) VALUES (' ";
       $query .=  join("', '", array_values($atributos));
       $query .=  " ')";
 
        $resultado= self::$db->query($query);
        if($resultado){
            header("location: ../tarea/admin?resultado=1");            
        }        
 }


 
 public function actualizar(){
        //sanatizar
        $atributos = $this->sanatizarDatos();
         
        $valores = [];
        foreach($atributos as $key => $value){
         $valores[] = "{$key}='{$value}' ";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= "LIMIT 1";
        
        $resultado = self::$db->query($query);
 
        if($resultado){
         //redireccionar al usuario despues de insertar los datos
         header('location: ../tarea/admin?resultado=2');

     }
 
 }
 public function eliminarV(){
    //elimina el registro        
    $query = "DELETE FROM " . static::$tabla . " WHERE id = ". self::$db->escape_string($this->id);
    $resultado = self::$db->query($query);

    if($resultado){
        header('location: ../tarea/admin?resultado=3');

    }
 }
 //elminar registro
 public function eliminar(){
     //elimina el registro        
     $query = "DELETE FROM " . static::$tabla . " WHERE id = ". self::$db->escape_string($this->id);
     $resultado = self::$db->query($query);
     
     if($resultado){
         header('location: ../tarea/admin?resultado=3');

     }
 }
 
     //identificar y unir los atributos de la BD    
     public function atributos(){
         $atributos = [];
         foreach(static::$columasDB as $columna){
             if($columna ==='id') continue; //si se cumple el if deja de ejecutarlo, pasando al siguiente (titulo)
             $atributos[$columna] = $this->$columna;
         }
         return $atributos;
     }
 
     
     public function sanatizarDatos(){
         $atributos =  $this->atributos();
         $sanatizado  = [];
 
         //recorrer arreglo de atributos
         foreach($atributos as $key => $value) { //key muestra las columas de la BD
             $sanatizado[$key] = self::$db->escape_string($value);
         }
 
         return $sanatizado;
     }

 
     //validacion (errores)
     public static function getErrores(){
         return self::$errores;
 
     }
 
     public function validar(){
         static::$errores = [];//se inicializo vacio, para limpiar la variable errores
         return static::$errores;
     }
 
    //listar todas los registros
     public static function all(){
         $query = "SELECT * FROM " . static::$tabla;
 
         $resultado = self::consultarSLQ($query);
         return $resultado;
     }

     public static function allPaginate($page=1){
        $cantidadPorPagina = 3;
        $elementoInicial = ($page - 1) * $cantidadPorPagina;
        $query = " SELECT * FROM  " . static::$tabla ." order by id  LIMIT $elementoInicial , $cantidadPorPagina ";
        $resultado = self::$db->query($query);

        $numeroRegistros = $resultado->num_rows;
      

        if($resultado){
            // Cycle through results
           $array = [];
            while ($row = $resultado->fetch_object()){
               $array[] = static::crearObjeto($row);
               }
           // Free result set
           $resultado->close();
       }

       $query = "SELECT COUNT(id) as Count FROM " . static::$tabla ; 
       $resultado = self::$db->query($query);     

       if($resultado){
                // Cycle through results
            $total = '';
                while ($row = $resultado->fetch_object()){
                $total = $row->Count;
                }
            // Free result set
            $resultado->close();
            
        }
        $totalPag = ceil( $total / $cantidadPorPagina );
        //return $totalPag;
        

       

        $array3 = ['cantidadPorPagina' => $cantidadPorPagina, 
        'elementoInicial'=>$elementoInicial, 
        'numeroRegistros' => $numeroRegistros, 
        'arreglo'=> $array,
        'total'=> $total, 
        'totalDePaginas'=>$totalPag];
        return $array3; 
        

     }

  

     //obtiene determinado numero de registros
     public static function get(){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . 3;
        $resultado = self::consultarSLQ($query);

        return $resultado;
    }

     //busca un registro su id
     public static function find($id){//buscar
         $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        
         $resultado = self::consultarSLQ($query);
         
         return ($resultado[0]);
 
     }
 
     public static function consultarSLQ($query){
         //consultar la base de datos
         $resultado = self::$db->query($query);

        if($resultado){
         // Cycle through results
        $array = [];
         while ($row = $resultado->fetch_object()){
            $array[] = static::crearObjeto($row);
            }
        // Free result set
        $resultado->close();
    }
         //iterar? los resultados // traer los resultado
        
        /* while($resultado && mysqli_num_rows($resultado)>0){
         }*/

         //liberar la memoria
         //$resultado->free();
 
         //retornar resultados
         
         return $array;
        
     }
     protected static function crearObjeto($registro){
         $objeto = new static;
 
         foreach($registro as $key => $value){
             if(property_exists($objeto, $key)){
                 $objeto->$key = $value;
             }
         }
         return $objeto;
     }
 
     //actualizacion y verificacion del campo actualizado
     public function sincronizar($args = []){
         foreach($args as $key => $values){
             if(property_exists($this, $key) && !is_null($values)){//
                 $this->$key = $values;
             }
         }          
     }

     
}