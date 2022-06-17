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
<h2>TIPOS</h2>
    <a href="../tipo/crear" class="boton boton-azul-block">Nuevo Tipo</a>
    <a href="admin" class="boton boton-amarillo">Tabla Tarea</a>


    <table class="tareas">
        <thead>
            <tr>
                <th>Id</th>
                <th>nombre</th>
                <th>Acciones</th>

            </tr>
        </thead>

        
        <tbody><!--  mostrar los resultados -->
        <?php  

        foreach($tipo as $tipos): ?>
            <tr>
                <td class="linea">  <?php echo $tipos->id;?></td>
                <td class="linea">  <?php echo $tipos->nombre;?></td>
                <td class="linea">

                    <form method="POST" class="w-100" action="eliminar">
                    <input type="hidden" name="id" value="<?php echo $tipos->id; ?>">
                    <input type="hidden" name="tipo" value="lista">

                    <input type="submit" class="boton-rojo-block" value="eliminar">
                    </form>

                    <a href="../tipo/actualizar?id=<?php echo $tipos->id;?>" class="boton boton-rosa-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="/public/build/js/bundle.min.js"></script>

</main>    
    </body>
</html>