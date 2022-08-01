<?php 
include __DIR__ . '../../../includes/templates/header.php';
?>
  
<h1>Actualizar Tipo</h1>

<?php /*foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error;?>    
        </div>
 <?php endforeach;*/ ?>

 <a href= "/public/index.php/tipo/adminT" class="btn btn-secondary btn-lg">volver</a>

     <form class="formulario" method="POST" action="actualizar" enctype="multipart/form-data">

             <?php include __DIR__ . '/formularioT.php';?>
             
             <input type="submit" value="Actualizar Tipo" class="btn btn-success btn-lg"> 

      </form>

<?php 
include __DIR__ . '../../../includes/templates/footer.php';
?>