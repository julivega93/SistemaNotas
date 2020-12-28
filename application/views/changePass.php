<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Cambiar Password</title>
  </head>
  <body>
    <div class="container">
    <div class="row">
    <div class="col-12">
        
   
      <?php $this->load->view('navbar');?>
    <hr>
    </div> <!--- fin col-12 --->   
    </div>  <!--- fin row ---> 
    <br>
    <div class="row ">
    <div class="col-6 mx-auto">
        <?php 
        if($this->session->flashdata("PASSCHANGED")){
        ?>
        <p class="alert alert-success">La contraseña se actualizó correctamente!</p>  
        <?php
        }
        ?>
    <div class="card shadow">
      <h5 class="card-header"><i class="fas fa-cog"></i> Change Password </h5>
      <div class="card-body">
        <form method="post" action="<?php echo site_url('usuarios/changepass')?>">
          <div class="form-group">
           <?php echo validation_errors('<span class="error text-danger">', '</span><br>');?>
            <label for="setUser" class="text-info">Username</label>
            <input type="text" class="form-control" id="setUser" name="setUser" value="<?php echo $this->session->userdata('user'); ?>" disabled>
            <small class="form-text text-muted">Min. 4 characters - Max. 12 characters</small>
          </div>
          <div class="form-group">
            <label for="changePass" class="text-info">New password</label>
            <input type="password" class="form-control" id="changePass" name="changePass">
            <small class="form-text text-muted">Min. 4 characters - Max. 12 characters</small>
          </div>
          <button type="submit" id="submit" class="btn btn-primary w-100"><i class="fas fa-check"></i> Aceptar cambios </button>
        </form><br>
          <div class="text-center">
           <a href="<?php echo site_url('perfil');?>" >Volver</a>
          </div>
        </div><!-- fin card-body-->
        </div><!-- fin card -->

    </div> <!--- fin col-12 --->   
    </div>  <!--- fin row ---> 
    </div><!--- fin container --->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  </body>
</html>