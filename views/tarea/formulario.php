<fieldset>
        <legend>Informacion general</legend>

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="tarea[descripcion]" placeholder="Descripcion tarea" value="<?php echo s($tarea->descripcion);?>">              
       
        <label for="tipoid">Tipo</label>
        <select name="tarea[tipoid]" id="tipoid">
        <option selected value=" ">---SELECCIONE---</option>    
        <?php foreach($tipo as $tipos) {?>
                    <option 
                    <?php echo $tarea->tipoid === $tipos->id ? 'selected' : ''; ?>
                    value="<?php echo s($tipos->nombre);?>"> <?php echo s($tipos->nombre);?></option>
                <?php } ?>
        </select>

        <label for="estado">Estado:</label>        
        <select name="tarea[estado]" id="estado">
                <option selected value=" ">--SELECCIONE--</option>
                <option value="<?php echo s("PENDIENTE");?>">PENDIENTE</option>
                <option value="<?php echo s("FINALIZADO");?>">FINALIZADO</option>


        </select>
    </fieldset>

