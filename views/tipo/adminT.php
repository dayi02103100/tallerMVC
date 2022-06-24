<!doctype html>
<html lang="en">
    <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <body>
<main class="contenedor seccion">
        <h1>Aministrador de To-Do List</h1>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="/public/build/css/app.css">

         <?php

if(isset($resultado)){
            $mensaje = mostrarNotificacion(intval($resultado));
                
            if($mensaje) { ?> 
                <p class="alerta exito"><?php echo s($mensaje)?></p> 
             <?php 
             } 
          }
        ?>

  
<h2>TIPOS</h2>
<div class=" p-2 d-flex justify-content-left ">
        
        <a  href="../tipo/crear" class="btn btn-primary disable fs-2 text-capitalize mx-3">nueva tipo</a>

        <a  href="../tarea/admin" class="btn btn-info disable fs-2 text-capitalize">tarea</a>
  </div >



    <table class= "table mt-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>nombre</th>
                <th>Acciones</th>
                <th></th>
            </tr>
        </thead>

        
        <tbody><!--  mostrar los resultados -->
        <?php  

        foreach($tipo as $tipos): ?>
            <tr class="pt-4">
                <td class="pt-3">  <?php echo $tipos->id;?></td>
                <td class="pt-3">   <?php echo $tipos->nombre;?></td>
                <td class="pt-4">
                <div class="d-flex align-items-center gap-3">
                    <form method="POST"  action="eliminar">
                    <input type="hidden" name="id" value="<?php echo $tipos->id; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $tipos->nombre; ?>">
               
                    <input type="hidden" name="tipo" value="tipo">
                    <button type="submit" class="bi bi-trash3 fs-1 ">

                    </form>
                    <a href="../tipo/actualizar?id=<?php echo $tipos->id;?>" class="bi bi-pencil-square fs-1"></a>

                    </div>
                    </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="/public/build/js/bundle.min.js"></script>

</main>    
    </body>
</html>