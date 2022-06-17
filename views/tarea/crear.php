<html>
    <body>
<main class="contenedor seccion">
<link rel="stylesheet" href="/public/build/css/app.css">

<h1>Crear Tarea</h1>

<?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>    
        </div>
 <?php endforeach; ?>

 <a href= "/public/index.php/tarea/admin" class="boton boton-azul-block">volver</a>
<!--action="/vendedores/crear"-->

     <form class="formulario" method="POST" enctype="multipart/form-data">
             <?php include __DIR__ . '/formulario.php';?>
             
             <input type="submit" value="Crear Tarea" class="boton boton-azul-block"> 

      </form>
      <script src="/public/build/js/bundle.min.js"></script>

</main>
    </body>
</html>
