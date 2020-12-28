<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Emprendedores</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
    <div class="col-12">
        
   
    <h1 class='text-center'>Registro de notas</h1>
    <hr>
    </div> <!--- fin col-12 --->   
    </div>  <!--- fin row ---> 
    <br>
    <div class="row ">
    <div class="col-lg-6 col-sm-12 mx-auto">
    <?php if($this->session->flashdata('noautoriza')){?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
            </button>
            <strong>No autorizado!</strong> Debe iniciar sesión para acceder a la página.
          </div>
        <?php } ?>
        
        
        
    <div class="card shadow">
      <h5 class="card-header"><i class="fas fa-user"></i> Log In </h5>
      <div class="card-body">

        <form method="post">
          <div class="form-group">
            <?php if($this->session->flashdata('CAMBIAPASS')){ ?>
                <div class="alert alert-success">La contraseña ha sido actualizada correctamente.<br>Ingrese con sus nuevos datos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php } ?>
              
            <?php if($this->session->flashdata('ERROR')){ ?>      
                <div class="alert alert-danger">Los datos ingresados no son válidos.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php } ?>

            <?php if($this->session->flashdata('CUENTACREADA')){?>
                <div class="alert alert-success">Cuenta creada con éxito!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php } ?>

              
            <label for="user" class="text-info">Username</label>   
            <input type="text" class="form-control " id="user" name="user" value="<?php echo set_value('user'); ?>">
            <small class="form-text text-muted">Min. 4 characters - Max. 12 characters</small>

          </div>
          <div class="form-group">
            <label for="pass" class="text-info">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" value="<?php echo set_value('pass'); ?>">
            <small class="form-text text-muted">Min. 4 characters - Max. 12 characters</small>
          </div>
          <button type="submit" id="submit" class="btn btn-primary w-100">Ingresar <i class="fas fa-sign-in-alt"></i></button>
        </form><br>
    <div class="text-center">
           <a href="<?php echo site_url('inicio/registro');?>">¿No tienes cuenta? REGISTRARSE</a>
    </div>
    </div><!-- fin card-body-->
    </div><!-- fin card -->

    </div> <!--- fin col-12 --->   
    </div>  <!--- fin row ---> 
    </div><!--- fin container --->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $("#user").focus();
    })  
    </script>

  </body>
</html>