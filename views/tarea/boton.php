<html>
        <link rel="stylesheet" href="/public/build/css/app.css">
<a href= "/public/index.php/tarea/admin" class="boton boton-azul-block">volver</a>
<form class="formulario" method="POST" enctype="multipart/form-data">

<fieldset>
        <legend>Informacion general</legend>

        <label for="descripcion">Descripcion:</label>
        <input disabled type="text" id="descripcion" name="tarea[descripcion]" placeholder="Descripcion tarea" value="<?php echo s($tarea->descripcion);?>">              
       
        <label for="tipoid">Tipo</label>
        <select disabled name="tarea[tipoid]" id="tipoid">
        <option selected value="">---SELECCIONE---</option>    
        <?php foreach($tipo as $tipos) {?>
                    <option 
                    <?php echo $tarea->tipoid === $tipos->id ? 'selected' : ''; ?>
                    value="<?php echo s($tipos->nombre);?>"> <?php echo s($tipos->nombre);?></option>
                <?php } ?>
        </select>

        <label for="estado">estado:</label>
        <input type="text" id="cambio" name="tarea[estado]" placeholder="Descripcion estado" value="<?php echo s($tarea->estado);?>">              
        
    </fieldset>
    <input type="submit" id="boton" value="Actualizar estado" class=" boton boton-azul-block"> 
   
</form>
