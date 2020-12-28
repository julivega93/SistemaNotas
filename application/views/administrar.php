<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/estilos.css" type="text/css">

    <title>Administrar registro/nota</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
    <div class="col-12">
        
   
    <?php $this->load->view('navbar');?>

    </div> <!--- fin col-12 --->   
    </div>  <!--- fin row ---> 
        
    <br>
    <div class="row"> 
    <div class="col-12 mx-auto">
        <?php foreach($administrar as $a){?>
        <div class="jumbotron shadow border">
            <span class="text-muted"><small><?php echo $a['fecha'];?></small></span>
      
            <h1 class="display-5 font-weight-bold"><?php echo strtoupper($a['titulo'])?> 
               
                <!-- NOTAS=> EDITAR // BORRAR // VOLVER -->
              <a class="btn btn-danger btn-sm shadow-sm mr-2 borrar float-right px-3 py-3" href="<?php echo site_url("perfil/borrar/".$a["registro_id"]); ?>" title="Eliminar registro"><i class="fas fa-trash-alt"></i></a>
              <a class="btn btn-success btn-sm shadow-sm mr-2 editar float-right px-3 py-3" href="<?php echo site_url("perfil/editar/".$a["registro_id"]); ?>" title="Editar registro"><i class="fas fa-edit"></i></a>
              <a class="btn btn-warning  btn-sm shadow-sm mr-2 float-right px-3 py-3" href="<?php echo site_url('perfil');?>" title="Volver al listado"><i class="fas fa-arrow-left"></i></a>
                
            </h1>


            
          <hr class="my-4">
            <p ><?php echo $a['descripcion']?></p>
          <hr>        
        <?php if($this->session->flashdata('ACTUALIZADO')){ ?>
            <span class="text-success float-right" id="actualizado"><i class="far fa-check-circle"></i> Registro actualizado!</span>
        <?php } ?>
        </div>
        <?php } ?>
    </div> <!--- fin col-12 --->  
    </div>  <!--- fin row ---> 
    </div><!--- fin container --->

          <!-- Modal Confirmar Borrar -->
        <div class="modal" tabindex="-1" id="confirmacion">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header px-2">
                <h5 class="modal-title">¿Está seguro que desea borrar éste registro?</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>
                    Si confirma esta acción, su registro será eliminado. <br>
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="#" class="btn btn-success" id="confirmasi">Confirmar</a>
              </div>
            </div>
          </div>
        </div> 
      <!--Fin Modal Confirmar -->
      
      <!--Modal Editar -->
       <?php foreach($administrar as $a){?>
      <form method="post" action="<?php echo site_url('perfil/editar/'.$a['registro_id'])?>">
        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" name="editar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="titleeditar">Editar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Título:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $a['titulo']?>">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descripción:</label>
                      <textarea class="form-control" id="description" name="description" style="display:block; height:250px; "><?php echo $a['descripcion']?></textarea>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" id="editarsi">Confirmar edición</button>
              </div>
            </div>
          </div>
        </div>
          </form>
      <?php } ?>
      <!--Fin Modal Editar -->
      
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("a.borrar").click(function(e){
                e.preventDefault();
                var direccion=$(this).attr("href");
                console.log(direccion);
                $("a#confirmasi").attr("href",direccion);
                $("#confirmacion").modal("show");
            });  
            
            $("a.editar").click(function(e){
                e.preventDefault();
                var direction=$(this).attr("href");
                console.log(direction);
                $("a#editarsi").attr("href",direction);
                $("#editar").modal("show");
            });  
            
            if(window.innerWidth < 768){
                $(".btn-sm").removeClass('px-3');
                $(".btn-sm").removeClass('py-3');
            }
            
            setTimeout(function() {
                $("#actualizado").hide();
            },5000);
            
        });  
    </script>

  </body>
</html>