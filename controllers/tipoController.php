<?php
namespace Controllers;
use MVC\Router;
use Model\tipo;


class tipoController{
  public static function index(Router $router){
    $tipo = tipo::all();
        //mensaje condicional
 $resultado = $_GET['resultado'] ?? null;


    $router->render('/tarea/adminT', [
        'tipo' => $tipo,
        'resultado' => $resultado
    ]);        
}


    public static function crear(Router $router){
        $tipo = new tipo;
        $errores = tipo::getErrores();

        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $tipo = new tipo($_POST['tipo']);           
            $errores = $tipo->validar();

            //si no hay errores: empty//verifica si esta vacio
          if(empty($errores)){
            $tipo->crear();
          }
    }
    $router->render('/tipo/crear', [
        'tipo' => $tipo,
        'errores' => $errores
    ]); 
}

  public static function actualizar(Router $router){
    $tipos = new tipo;
    $id = vaidarORedireccionar('/public/index.php/tarea/admin');
    $tipos = tipo::find($id);
    $errores = tipo::getErrores();

    
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
      //asignar los atrributos
      $args = $_POST['tipo'];//???
      //debuguear($args);    
      $tipos->sincronizar($args);

      $errores = $tipos->validar();
      
      if(empty($errores)){
          $tipos->actualizar();
      }
  }
  $router->render('/tipo/actualizar',[
      'tipo' => $tipos,
      'errores'=> $errores
  ]);
  }
  public static function eliminar(){
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //validando id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if($id){
         $tipo  = $_POST['tipo'];//viaja 
                    
            if(validarTipoContenido($tipo)){
                $tipos = tipo::find($id);
                $tipos->eliminarV();
            }      
        }
    }
         
    }

}
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>