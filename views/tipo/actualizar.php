<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <body>
<main class="contenedor seccion">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<link rel="stylesheet" href="/public/build/css/app.css">

<h1>Actualizar Tipo</h1>

<?php /*foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>    
        </div>
 <?php endforeach;*/ ?>

 <a href= "/public/index.php/tipo/adminT" class="btn btn-secondary btn-lg">volver</a>

     <form class="formulario" method="POST" action="actualizar" enctype="multipart/form-data">

             <?php include __DIR__ . '/formularioT.php';?>
             
             <input type="submit" value="Actualizar Tipo" class="btn btn-success btn-lg"> 

      </form>
</main>
