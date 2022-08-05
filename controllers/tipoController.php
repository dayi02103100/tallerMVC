<?php
namespace Controllers;
use MVC\Router;
use Model\tipo;


class tipoController{
  public static function index(Router $router){
    $tipos = tipo::all();
    $tipo = new tipo;
        //mensaje condicional
 $resultado = $_GET['resultado'] ?? null;


    $router->render('/tipo/adminT', [
        'tipos' => $tipos,
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
    /*$router->render('/tipo/crear', 
        'tipo' => $tipo,
        'errores' => $errores
    ]); */
    header('location: adminT?resultado=1');
}

  public static function actualizar(Router $router){          
    $tipo = new tipo;
    $errores = tipo::getErrores();
    
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
      //asignar los atrributos
      $args = $_POST['tipo'];//???

      //debuguear($args);    
      $tipo->sincronizar($args);

//      $errores = $tipo->validar();
      
      if(empty($errores)){
          $tipo->actualizar();

      }
  }
  header('location: adminT?resultado=2');


  }
  public static function eliminar(){
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //validando id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if($id){
         $tipo  = $_POST['tipo'];//viaja                     debuguear($_POST);
            if(validarTipoContenido($tipo)){
                $tipos = tipo::find($id);
                $tipos->eliminar();
            }      
        }
    }
    header('location: adminT?resultado=3');

    }

}
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>