<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <title>Home - Lista de Notas</title>
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
    <div class="col-md-8 col-sm-12 mx-auto">
        
        <?php if($this->session->flashdata('BAJA')){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">El registro ha sido eliminado correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>     
        <?php } ?>
        

         <?php if(count($registros)){;?>
        <div class="card bg-light mb-3 shadow " style="max-width: 540px;">
        <h5 class="card-header"><i class="fas fa-folder-open"></i> Mis registros</h5>
       
        <?php foreach($registros as $r){;?>
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="<?php echo base_url('/assets/imgs/sticky2.png')?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body bg-info text-white">
                <h5 class="card-title text-warning"><?php echo strtoupper($r['titulo']);?></h5><span class="float-right text-muted"><small><?php echo $r['fecha'];?></small></span>
                <p class="card-text te"><?php echo substr($r['descripcion'],0,60);?>...</p>
                <a href="<?php echo site_url("perfil/admReg/".$r["registro_id"]);?>" class="btn btn-sm btn-secondary">Administrar</a>
              </div>
            </div>
          </div>
            <hr>
            <?php }
            }else{ ?>
                <div class="alert alert-secondary shadow-sm mt-1">No hay registros.</div>
            <?php } ?>
        </div>

    </div> <!--- fin col-12 --->  
    </div>  <!--- fin row ---> 
    </div><!--- fin container --->
      
      
    <div class="modal" id="salirconfirm" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
      
      
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  </body>
</html>