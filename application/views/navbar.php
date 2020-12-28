<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm rounded">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('perfil');?>"><i class="fas fa-home text-info"></i> Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('perfil/nuevoe');?>"><i class="fas fa-plus-square text-info"></i> Cargar registro<span class="sr-only">(current)</span></a>
      </li>
      </ul>
    <ul class="navbar-nav ml-auto">
        <?php if($this->session->userdata('rol')=="A"){ ?>
        <li class="nav-item active">
            <a href="<?php echo site_url('perfil/listusers')?>" class="nav-link mr-5 border-left border-right border-secondary"><i class="fas fa-cogs"></i> Panel de Administrador</a>
        </li>
       
         <li class="nav-item active">
            <a class="navbar-brand mr-2" href="<?php echo site_url('perfil');?>"> <i class="fa fa-user-secret text-warning" aria-hidden="true"></i>
        <?php echo ucfirst($this->session->userdata('user'));?> </a>
        </li>
         <?php }else{ ?>
        <li class="nav-item active">
            <a class="navbar-brand mr-2" href="<?php echo site_url('perfil');?>"> <i class="fas fa-user text-info"></i> <?php echo ucfirst($this->session->userdata('user'));?> </a>
        </li>
        <?php } ?>
        <li class="nav-item dropdown mr-5">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo site_url('usuarios')?>">Cambiar password</a>
        </div>
        </li>
      <li class="nav-item">
        <a href="<?php echo site_url('perfil/salir');?>" class="btn btn-danger" title="Cerrar sesión" id="salir">Sign Out <i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </div>
</nav>
