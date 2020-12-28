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

    <title>Papelera de Reciclaje - ADMIN</title>
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
    <div class="col-10">
        <div id="papelera">
          
           <btn class="btn btn-sm btn-info mr-2 shadow-sm mb-3" id="tab1">Usuarios borrados</btn>
           <btn class="btn btn-sm btn-info mb-3" id="tab2">Registros borrados</btn>

          <div class="tab_content" id="tabla1">
              <?php if(count($papelerau)){;?>
         <table class="table table-striped table-bordered shadow">
          <thead>
            <tr class="bg-info shadow-sm">
              <th scope="col">User ID</th>
              <th scope="col">User </th>
              <th scope="col">Email</th>
              <th scope="col">Estado</th>
              <th scope="col">Rol</th>
              <th scope="col">Restablecer</th>
            </tr>
          </thead>
           <?php foreach($papelerau as $u){;?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $u['user_id']?></th>
              <td><?php echo $u['user'];?></td>
              <td><?php echo $u['email'];?></td>
              <td><?php echo $u['state'];?></td>
              <td><?php echo $u['rol'];?></td>
              <td><a class="btn btn-warning btn-sm shadow-sm mr-2" href="<?php echo site_url('perfil/restablecer_usuario/'.$u["user_id"])?>" title="Restablecer usuario"><i class="fas fa-undo"></i></a></td>
            </tr>
          </tbody>
             <?php } ?>
        </table>
            <hr>
            <?php 
            }else{ ?>
                <div class="alert alert-secondary shadow-sm mt-1">No hay usuarios eliminados.</div>
            <?php } ?>
              
            
           
          </div>
          <div class="tab_content" id="tabla2">
                   
         <?php if(count($papelerar)){;?>
         <table class="table table-striped table-bordered shadow">
          <thead>
            <tr class="bg-info shadow-sm">
              <th scope="col">#ID</th>
              <th scope="col">User ID</th>
              <th scope="col">Titulo</th>
              <th scope="col">Descripción</th>
              <th scope="col"><small class="text-center text-light">1 = borrado</small><br>Borrado lógico</th>
              <th scope="col">Restablecer</th>
            </tr>
          </thead>
           <?php foreach($papelerar as $r){;?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $r['registro_id']?></th>
              <td><?php echo $r['user_id']?></td>
              <td><?php echo substr($r['titulo'],0,20);?></td>
              <td><?php echo substr($r['descripcion'],0,20);?>...</td>
              <td><?php echo $r['borrado']?></td>
              <td>
       
              <a class="btn btn-warning btn-sm shadow-sm mr-2" href="<?php echo site_url('perfil/restablecer_registro/'.$r["registro_id"])?>" title="Restablecer registro"><i class="fas fa-undo"></i></a>
             
                
              </td>
            </tr>
          </tbody>
             <?php } ?>
        </table>
            <hr>
            <?php 
            }else{ ?>
                <div class="alert alert-secondary shadow-sm mt-1">No hay registros eliminados.</div>
            <?php } ?>
          </div>
        </div>

       
         
 

    </div> <!--- fin col-10--->  
        




 

  
        
        
    </div>  <!--- fin row ---> 
    </div><!--- fin container --->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $("#tab1").click(function(){
            $("#tabla2").hide('slow');
            $("#tabla1").fadeToggle();
        })
        
        $("#tab2").click(function(){
            $("#tabla1").hide('slow');
            $("#tabla2").fadeToggle();
        })
    })

    </script>

  </body>
</html>