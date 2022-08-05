<?php

//definir constantes
define('TEMPLATES_URL', __DIR__ . '/templates');//DIR tomara la ubicacion?
define('FUNCIONES',  __DIR__ . 'funciones.php');

function incluirTemplate(string $nombre, bool $inicio ){//si la variable inicio no esta definido como true no colocara la imagen 
    include  TEMPLATES_URL ."/${nombre}.php"; 
}



function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;

}

function s($html) {
    $s = htmlspecialchars($html);
    return $s;
}

//validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['tarea', 'tipo'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo){
    $mensaje = '';
    
    switch($codigo){
        case 1:?>
            <div class="alert alert-success"  id="demo">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
           <h3>Creado Correctamente</h3>
            </div>            
            <?php break;

        case 2:?>
            <div class="alert alert-warning"  id="demo">
            <button type="button" class="close " data-dismiss="alert">&times;</button>
           <h3>Actualizado Correctamente</h3>
            </div>           
            <?php break;

        case 3:?>

           <div class="alert alert-danger " id="demo">
           <button type="button" class="close"  id="demo" data-dismiss="alert">&times;</button>
           <h3>Eliminado Correctamente</h3>
            </div>           
            <?php break;

        
    

        default:
        $mensaje = false;
        break;
             
    }


    return $mensaje;
}

function vaidarORedireccionar(string $url){
    //validar la URL por el id de cada uno
    $id = $_GET['id'];//    id=parametro
    $id = filter_var($id, FILTER_VALIDATE_INT);//filtro de confirmacion de si es un entero

    if(!$id){
        header("Location: ${url}");
    }

    return $id;
}

?>
