<fieldset>
        <legend>Informacion general</legend>

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="tarea[descripcion]" placeholder="Descripcion tarea" value="<?php echo s($tarea->descripcion);?>">              
       
        <label for="tipoid">Tipo</label>
        <select name="tarea[tipoid]" id="tipoid">
        <option selected value="">---SELECCIONE---</option>    
        <?php foreach($tipo as $tipos) {?>
                    <option 
                    <?php echo $tarea->tipoid === $tipos->id ? 'selected' : ''; ?>
                    value="<?php echo s($tipos->nombre);?>"> <?php echo s($tipos->nombre);?></option>
                <?php } ?>
        </select>

        <label for="estado">estado:</label>
        <input type="text" id="estado" name="tarea[estado]" placeholder="Descripcion estado" value="<?php echo s($tarea->estado);?>">              
       
    </fieldset>

