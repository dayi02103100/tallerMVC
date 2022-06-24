<?php

namespace Controllers;
use MVC\Router;
use Model\tarea;
use Model\tipo;
use Model\ActiveRecord;
use Intervention\Image\ImageManagerStatic as Image;


class tareaController{
    
    public static function index(Router $router){
        $tarea = tarea::all();
        $tipo = tipo::all();
            //mensaje condicional
     $resultado = $_GET['resultado'] ?? null;


        $router->render('/tarea/admin', [
            'tarea' => $tarea,
            'tipo' => $tipo,
            'resultado' => $resultado
        ]);        
    }
    public static function crear(Router $router){
        $tarea = new tarea;
        $tipo = tipo::all();
        $errores = tarea::getErrores();


        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $tarea = new tarea($_POST['tarea']);
             
           //valida
            $errores =  $tarea->validar();                  
         //exit; va aprevenir que se siga ejecutando el resto del codigo         
         //revisar que el array de errores este vacio        
         if(empty($errores)){    
           
             //guardar en la base de datos
              $tarea->crear();        
         }                            
      
        }
        $router->render('/tarea/crear', [
            'tarea' => $tarea,
            'tipo' => $tipo,
            'errores' => $errores
        ]);        
    }

    public static function actualizar(Router $router){
        $id = vaidarORedireccionar('/public/index.php/tarea/admin');
        $tarea = tarea::find($id);
        $tipo = tipo::all();
        $errores = tarea::getErrores();

        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            //asignar los atrributos
            $args = $_POST['tarea'];//???
         
            $tarea->sincronizar($args);
     
            if(empty($errores)){                           
            $tarea->actualizar();
            }
        }
        $router->render('/tarea/actualizar',[
            'tarea' => $tarea,
            'tipo'=> $tipo,
            'errores'=> $errores
    ]);
}

    public static function boton(Router $router){
        $id = vaidarORedireccionar('/public/index.php/tarea/admin');
        $tarea = tarea::find($id);
        $tipo = tipo::all();
        $errores = tarea::getErrores();

        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            //asignar los atrributos
            $args = $_POST['tarea'];//???
         
            $tarea->sincronizar($args);
     
            if(empty($errores)){                           
            $tarea->actualizar();
            }
        }
        $router->render('/tarea/boton',[
            'tarea' => $tarea,
            'tipo' => $tipo,
            'errores'=> $errores

    ]);

    }

    public static function eliminar(){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //validando id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if($id){
             $tipo  = $_POST['tarea'];
                        
                if(validarTipoContenido($tipo)){
                    $tarea = tarea::find($id);
                    $tarea->eliminar();
                }      
            }
        }
             
        }
}