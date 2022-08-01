<?php 
include __DIR__ . '../../../includes/templates/header.php';
?>
<h1>Crear Tipos</h1>

<?php /* foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>    
        </div>
 <?php endforeach;*/ ?>
 

 <a href= "/public/index.php/tipo/adminT" class="btn btn-secondary btn-lg">volver</a>
<!--action="/vendedores/crear"-->

     <form class="formulario" method="POST" action="crear" enctype="multipart/form-data">
             <?php include __DIR__ . '/formularioT.php';?>
             
             <input type="submit" value="Crear Tipo" class="btn btn-success btn-lg"> 

      </form>

<?php 
include __DIR__ . '../../../includes/templates/footer.php';
?>











