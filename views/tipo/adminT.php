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
        
<h2>TIPOS</h2>
<div class=" p-2 d-flex justify-content-left ">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#abrir" >Nuevo Tipo</button>

<div class="modal fade pt-5" id="abrir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="opacity: 3;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">

        <?php include __DIR__ . '/crear.php';?>
        
          <button type="button" class="btn btn-default" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cerca</font></font></button>
        </div>
      </div>
    </div>
</div>

        
        <!--a  href="crear" class="btn btn-primary disable fs-2 text-capitalize mx-3" >nueva tipo</!--a-->

        <a  href="../tarea/admin" class="btn btn-primary disable fs-2 ms-5 text-capitalize" >tarea</a>
  </div >

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="opacity: 3;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
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

        foreach($tipos as $tipo): ?>
            <tr class="pt-4">
                <td class="pt-3">  <?php echo $tipo->id;?></td>
                <td class="pt-3">   <?php echo $tipo->nombre;?></td>
                <td class="pt-4">
                <div class="d-flex align-items-center gap-3">
                    <form method="POST"  action="eliminar">
                    <input type="hidden" name="id" value="<?php echo $tipo->id; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $tipo->nombre; ?>">
               
                    <input type="hidden" name="tipo" value="tipo">
                    <button type="submit" class="bi bi-trash3 fs-1 ">

                    </form>
                   

                    <button type="button" class="btn btn-lg bi bi-pencil-square fs-1" id="boton" data-toggle="modal" data-target="#editar<?php echo $tipo->id;?>" > </button>

                    <!--a href="../tipo/actualizar?id=<?php echo $tipo->id;?>" data-target="#editar" class="bi bi-pencil-square fs-1"></!--a-->
                    <div class="modal fade pt-5" id="editar<?php echo $tipo->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="opacity: 3;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">

                              <?php include __DIR__ . '/actualizar.php';?>   

                              <button type="button" class="btn btn-default" data-dismiss="modal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cerca</font></font></button>
                            </div>
                          </div>
                          </div>
                        </div>
                        
 
                    </div>
                    </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    include __DIR__ . '../../../includes/templates/footer.php';
    ?>
