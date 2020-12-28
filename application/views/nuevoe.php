<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Nuevo Registro</title>
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
    <div class="col-12">
    <div class="card shadow" style="display:none">
      <h5 class="card-header"><i class="fas fa-file-import"></i> Nuevo registro </h5>
      <div class="card-body">
        <form method="post" action="<?php echo site_url('perfil/newReg') ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo" class="text-info">Título</label>
            <input type="text" class="form-control " id="titulo" name="titulo">
          </div>
          <div class="form-group">
            <label for="descripcion" class="text-info">Descripción</label>
            <textarea type="text" class="form-control row-4" id="descripcion" name="descripcion"></textarea>
          </div>

          <button type="submit" class="btn btn-success w-100">Publicar nota! <i class="far fa-check-circle text-success"></i></button>
        </form>
        </div><!-- fin card-body-->
        </div><!-- fin card -->

    </div> <!--- fin col-6 --->  
    </div>

    </div><!--- fin container --->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
      $(".card").fadeIn("slow","linear");
    })
    </script>

  </body>
</html>