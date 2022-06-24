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
 
    

      <h2>TAREAS</h2>    
    
      <div class=" p-2 d-flex justify-content-left ">
        
          <a  href="crear" class="btn btn-primary disable fs-2 text-capitalize mx-3">nueva tarea</a>
 
          <a  href="../tipo/adminT" class="btn btn-info disable fs-2 text-capitalize">tipo</a>
    </div >

    <table class="table mt-5" >
        
        <thead >
            <tr>
                <th>ID</th>
                <th>DESCRIPCION</th>
                <th>TIPO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>

        
        <tbody><!--  mostrar los resultados -->
        <?php  

        foreach($tarea as $tareas ): ?>
            <tr class="borde">               
                <td class="pt-5">  <?php echo $tareas->id;?></td>
                <td class="pt-5">  <?php echo $tareas->descripcion;?></td>
                <td class="pt-5"> <?php echo $tareas->tipoid;?></td>
                <td class=" <?=  ($tareas->estado === 'FINALIZADO')?'btn finalizado': 'badge rounded-pill text-bg-warning'                                        
                                      
                ?> my-5" id="cambio"> <?php echo $tareas->estado;?></td>
               
                <td class="pt-4">
                  <div  class="d-flex align-items-center gap-3">

                    <form method="POST"  action="eliminar">
                    <input type="hidden"  name="id" value="<?php echo $tareas->id; ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $tareas->descripcion; ?>">
                    <input type="hidden" name="tipoid" value="<?php echo $tareas->tipoid; ?>">
                    <input type="hidden" name="cambio" value="<?php echo $tareas->estado; ?>">
                    
           
                    <input type="hidden" name="tipo" value="tarea">
                    <button type="submit" class="bi bi-trash3 fs-1 ">
                    <!--input type="submit" class="bi bi-x-square"--></button>
                    </form>
                    
                    <a href="actualizar?id=<?php echo $tareas->id;?>" class="bi bi-pencil-square fs-1"></a>
                  </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    <script src="/public/build/js/bundle.min.js"></script>

</main>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
    </body>
</html>