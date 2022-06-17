<main class="contenedor seccion">
<link rel="stylesheet" href="/public/build/css/app.css">

<h1>Actualizar Tarea</h1>

<?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>    
        </div>
 <?php endforeach; ?>

 <a href= "/public/index.php/tarea/admin" class="boton boton-azul-block">volver</a>

     <form class="formulario" method="POST" enctype="multipart/form-data">
             <?php include __DIR__ . '/formulario.php';?>
             
             <input type="submit" value="Actualizar Tarea" class="boton boton-azul-block"> 

      </form>
</main>
