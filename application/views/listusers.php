<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Administrar Usuarios - ADMIN</title>
  </head>
  <body class=".body">
    <div class="container">
    <div class="row">
    <div class="col-12">
        
   
    <?php $this->load->view('navbar');?>

    </div> <!--- fin col-12 --->   
    </div>  <!--- fin row ---> 
        
    <br>

    <div class="row"> 
    <div class="col-2">
         <?php $this->load->view('paneladm');?>
    </div>
    <div class="col-10 mx-auto">

       
         <?php if(count($usuarios)){;?>
         <table class="table table-striped table-bordered shadow" style="display:none">
          <thead>
            <tr class="bg-info shadow-sm">
              <th scope="col">#ID</th>
              <th scope="col">User</th>
              <th scope="col">Pass</th>
              <th scope="col">Email</th>
              <th scope="col">Estado</th>
              <th scope="col">Rol</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>

           <?php foreach($usuarios as $u){; ?>

          <tbody>
            <tr>
              <th scope="row"><?php echo $u['user_id']?></th>
              <td><?php echo $u['user']?></td>
              <td><?php echo $u['pass']?></td>
              <td><?php echo $u['email']?></td>
              <td><?php echo $u['state']?></td>
              <td><?php echo $u['rol']?></td>
              <td>
              
              <a class="btn btn-success btn-sm shadow-sm mr-2 edituser" href="<?php echo site_url('perfil/editar_usuario/'.$u["user_id"])?>" title="Editar usuario" id="edituser" name="edituser"><i class="fas fa-edit"></i></a>
              <a class="btn btn-warning btn-sm shadow-sm mr-2" href="<?php echo site_url("usuarios/borrar/".$u["user_id"]); ?>" title="Desactivar usuario"><i class="fa fa-ban" aria-hidden="true"></i></a>
 
                
              </td>
            </tr>
          </tbody>
             <?php } ?>
        </table>
            <hr>
            <?php 
            }else{ ?>
                <div class="alert alert-secondary shadow-sm mt-1">No hay usuarios.</div>
            <?php } ?>
 

    </div> <!--- fin col-12 --->  
    </div>  <!--- fin row ---> 
    </div><!--- fin container --->

    <!--- Modal Editar_Usuario --->

      <?php foreach($usuarios as $u){;?>

        <form method="post" action="" id="form">
        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" name="editar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="titleeditar">Editar datos del usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body bg-secondary text-light">
                
                  <div class="form-group">
                    <label for="usuario" class="col-form-label text-warning">Usuario:</label>
                    <input type="text" class="form-control bg-dark text-light" id="eusuario" name="eusuario" value="">
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label text-warning">Password:</label>
                    <input type="text" class="form-control bg-dark text-light" id="epassword" name="epassword" value="">
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-form-label text-warning">E-mail:</label>
                    <input type="text" class="form-control bg-dark text-light" id="eemail" name="eemail" value="">
                  </div>
                  <div class="form-group">
                    <label for="rol" class="col-form-label text-warning">Rol:</label>
                    <input type="text" class="form-control bg-dark text-light" id="erol" name="erol" value="U">
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success" id="editarsi">Confirmar edición</button>
              </div>
            </div>
          </div>
        </div>
          </form>

      <?php } ?>
      <!--- Fin Modal Editar_Usuario --->
      
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
      $(".table").fadeIn("slow","linear");

        $("a.edituser").click(function(e){
                e.preventDefault();
                var direccion=$(this).attr('href');
                console.log(direccion);
                $("#form").attr('action',direccion);
                $("#editar").modal("show");

            }); 
    })  
    </script>

  </body>
</html>


















