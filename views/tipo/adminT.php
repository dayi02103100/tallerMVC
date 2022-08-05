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
                   

                    <button type="button" class="btn btn-lg bi bi-pencil-square fs-1" id="boton" data-toggle="modal" 
                    data-id="<?php echo $tipo->id; ?>" data-nombre="<?php echo $tipo->nombre; ?>"data-target="#editar"> </button>

                    <!--a href="../tipo/actualizar?id=<?php echo $tipo->id;?>" data-target="#editar" class="bi bi-pencil-square fs-1"></!--a-->
                                         
                       </div>
                      </td>
                     </tr>
                    <?php endforeach; ?>                                          
                  </tbody>                 
                </table>
                <div class="modal  pt-5" id="editar" tabindex="-1" role="dialog" 
      aria-labelledby="myModalLabel" aria-hidden="true" style="opacity: 3;">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-body" >

                              <?php include __DIR__ . '/actualizar.php';?>   

                  
                           </div>
                          </div>
                         </div>
                        </div> 
      

<script>
$(document).ready(function() {

const editar = document.getElementById('editar')
var myModal = new bootstrap.Modal(editar)
console.log(myModal);


})

$('#editar').on('shown.bs.modal', function(event) {
    //fired only in second modal
    console.log(event);
    

const button = event.relatedTarget
const recipient = button.getAttribute('data-id')
const recipients = button.getAttribute('data-nombre')
console.log(recipient);
console.log(recipients);


const id = document.getElementsByName('tipo[id]')
const nombre = document.getElementsByName('tipo[nombre]')
console.log(nombre);
id[1].value = recipient
nombre[1].value = recipients    
});



</script>

    <?php
    
    include __DIR__ . '../../../includes/templates/footer.php';
    ?>
