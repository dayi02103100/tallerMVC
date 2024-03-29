<?php 
include __DIR__ . '../../../includes/templates/header.php';



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
        foreach($tareas['arreglo'] as $tarea ): ?>
            <tr class="borde">               
                <td class="pt-5"> <?php echo $tarea->id;?></td>
                <td class="pt-5"> <?php echo $tarea->descripcion;?></td>
                <td class="pt-5"> <?php echo $tarea->tipoid;?></td>
                <td class=" <?=  ($tarea->estado === 'FINALIZADO')?'badge text-bg-success': 'badge rounded-pill text-bg-warning'                                        
                                      
                ?> my-5" id="cambio"> <?php echo $tarea->estado;?></td>
               
                <td class="pt-4">
                  <div  class="d-flex align-items-center gap-3">

                    <form method="POST"  action="eliminar">
                    <input type="hidden"  name="id" value="<?php echo $tarea->id; ?>">
                    <input type="hidden" name="descripcion" value="<?php echo $tarea->descripcion; ?>">
                    <input type="hidden" name="tipoid" value="<?php echo $tarea->tipoid; ?>">
                    <input type="hidden" name="cambio" value="<?php echo $tarea->estado; ?>">
                    
           
                    <input type="hidden" name="tipo" value="tarea">
                    <button type="submit" class="bi bi-trash3 fs-1 ">
                    <!--input type="submit" class="bi bi-x-square"--></button>
                    </form>
                    
                    <a href="actualizar?id=<?php echo $tarea->id;?>" class="bi bi-pencil-square fs-1"></a>
                  </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
   
   <nav aria-label="...">
   <ul class="pagination">
     <?php 
      if($pagina == 1){?>
        <li class="page-item disabled">
        <span class="page-link">Anterior</span>  
      </li>

      <?php }else{ ?>
        <li class="page-item">
          <a class="page-link" href="admin?page=<?php echo $pagina-1 ?>">Anterior</a>
        </li>
     <?php }?>
   
     
   <?php
   for($i = 0 ; $i < $tareas['totalDePaginas'] ; $i++){ 
     $page = $i+1;?>

      <li class="<?= ($pagina == $page)?'page-item active':'page-item' ?> "><a class="page-link" href="admin?page=<?php echo $page ?>"><?php echo $page ?></a></li>
   

   <?php } 
   if($pagina == $tareas['totalDePaginas']){?>
    <li class="page-item disabled">
    
    <span class="page-link">Siguiente</span>  </li>

   <?php }else{ ?>

   <li class="page-item ">
    
      <a class="page-link" href="admin?page=<?php echo $pagina + 1 ?>">Siguiente</a>
    </li>

    <?php }?>
   </ul>
   
   </nav>
             

<?php
    include __DIR__ . '../../../includes/templates/footer.php';
    ?>