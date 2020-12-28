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
        
   
    <h1 class='text-center'>Sitio para emprendedores</h1>
    <hr>
    </div> <!--- fin col-12 --->   
    </div>  <!--- fin row ---> 
    <br>
    <div class="row ">
    <div class="col-md-6 col-sm-12 mx-auto">
    <div class="card shadow">
      <h5 class="card-header"><i class="fas fa-user-plus"></i> Register </h5>
      <div class="card-body">
    <form method="post">
      <div class="form-group">
         <?php echo validation_errors('<span class="error text-danger">', '</span><br>');?>

        <label for="user" class="text-info">Username</label>
        <input type="text" class="form-control " id="username" name="username" value="<?php echo set_value('username'); ?>" focus>
        <small class="form-text text-muted">Min. 4 characters - Max. 12 characters</small>
      </div>
      <div class="form-group">
        <label for="pass" class="text-info">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <small class="form-text text-muted">Min. 4 characters - Max. 12 characters</small>
      </div>
      <div class="form-group">
        <label for="passconf" class="text-info">Password confirm</label>
        <input type="password" class="form-control" id="passwordconf" name="passwordconf">
        <small class="form-text text-muted">Min. 4 characters - Max. 12 characters</small>
      </div>
      <div class="form-group">
        <label for="email" class="text-info">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
      </div>
      <button type="submit" id="submit" class="btn btn-success w-100">Confirmar <i class="fas fa-check"></i></button>
    </form><br>
          <div class="text-center">
           <a href="<?php echo site_url('inicio/login');?>">Volver</a>
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