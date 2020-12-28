<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Administrar registros/notas - ADMIN</title>
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
    <div class="col-2">
         <?php $this->load->view('paneladm');?>      
    </div>
    <div class="col-10 mx-auto">


       
         <?php if(count($registros)){;?>
         <table class="table table-striped table-bordered shadow" style="display:none">
          <thead>
            <tr class="bg-info shadow-sm">
              <th scope="col">#ID</th>
              <th scope="col">User ID</th>
              <th scope="col">Titulo</th>
              <th scope="col">Descripción</th>
              <th scope="col"><small class="text-center text-light">1 = borrado</small><br>Borrado lógico</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
           <?php foreach($registros as $r){;?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $r['registro_id']?></th>
              <td><?php echo $r['user_id']?></td>
              <td><?php echo substr($r['titulo'],0,20);?></td>
              <td><?php echo substr($r['descripcion'],0,20);?>...</td>
              <td><?php echo $r['borrado']?></td>
              <td>
       
              <a class="btn btn-success btn-sm shadow-sm mr-2" href="" title="Editar usuario"><i class="fas fa-edit"></i></a>
              <a class="btn btn-danger btn-sm shadow-sm mr-2" href="<?php echo site_url("perfil/borrar/".$r["registro_id"]); ?>" title="Eliminar registro"><i class="fas fa-trash-alt"></i></a>
 
                
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
 

    </div> <!--- fin col-10 --->  
    </div>  <!--- fin row ---> 
    </div><!--- fin container --->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
      $(".table").fadeIn("slow","linear");

    });
    </script>

  </body>
</html>