<html>
    <body>
<main class="contenedor seccion">
        <h1>Aministrador de To-Do List</h1>
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
        <a href="crear" class="boton boton-azul-block">Nueva tarea</a>
          <a href="adminT" class="boton boton-amarillo">Tabla Tipo</a>

    <table class="tareas">
        
        <thead>
            <tr>
                <th>Id</th>
                <th>descripcion</th>
                <th>tipo</th>
                <th>estado</th>
                <th>acciones</th>
            </tr>
        </thead>

        
        <tbody><!--  mostrar los resultados -->
        <?php  

        foreach($tarea as $tareas): ?>
            <tr>               
                <td class="linea">  <?php echo $tareas->id;?></td>
                <td class="linea">  <?php echo $tareas->descripcion;?></td>
                <td class="linea"> <?php echo $tareas->tipoid;?></td>

                <td class="<?=  ($tareas->estado === 'FINALIZADO')?'finalizado': 'estados'                                        
                                      
                ?>" id="cambio"> <?php echo $tareas->estado;?></td>
               
                <td class="linea">

                    <form method="POST" class="w-100" action="eliminar">
                    <input type="hidden"  name="id" value="<?php echo $tareas->id; ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $tareas->descripcion; ?>">
                    <input type="hidden" name="tipoid" value="<?php echo $tareas->tipoid; ?>">
                    <input type="hidden" name="cambio" value="<?php echo $tareas->estado; ?>">
                    
           
                    <input type="hidden" name="tipo" value="tarea">

                    <input type="submit" class="boton boton-rojo-block" value="eliminar">
                    </form>

                    <a href="actualizar?id=<?php echo $tareas->id;?>" class="boton boton-rosa-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    <script src="/public/build/js/bundle.min.js"></script>

</main>    
    </body>
</html>