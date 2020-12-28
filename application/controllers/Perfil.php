<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    protected $datos=array();
    
    /*==================================
     - Valido que haya iniciado sesión y que su cuenta no esté desactivada.
     - Cargo los modelos y librerías necesarias.
    ==================================*/
    
    public function __construct(){
        parent::__construct();
        
        if($this->session->userdata('user_id')==NULL){
            $this->session->set_flashdata('noautoriza',true);
            redirect("inicio/login");
        }
        
        if($this->session->userdata('state')==0){
            $this->session->set_flashdata('noautoriza',true);
            redirect("inicio/login");
        }

        
        $this->load->model('carga_model');
        $this->load->model('login_model');
        $this->load->library('session');
    }


	public function index()
	{
        redirect('perfil/viewreg');
	}
    
    /*==================================
     - Cerrar sesión
    ==================================*/
    
    public function salir(){
        $this->session->sess_destroy();
        redirect('inicio/login');
    }
    
    /*==================================
     - Carga los registros/notas 
    ==================================*/
    
    public function viewReg(){
        $this->datos['registros']=$this->carga_model->viewReg(true);
        $this->load->view('perfil',$this->datos);

    }
    
    public function nuevoe(){
        $this->load->view('nuevoe');
    }
    
    /*==================================
     - Ésta función valida la creación de una nueva nota/registro
    ==================================*/
    public function newReg(){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('titulo','Titulo','required');
        $this->form_validation->set_rules('descripcion','Descripcion','required');
        $this->form_validation->set_rules('imgs','Images');
        

        if ($this->form_validation->run() == FALSE){
            //$datos['user']=$this->input->set_value('user');
            $this->load->view('nuevoe',$this->datos);

        }else{
            $nuevoreg=array();
            $nuevoreg["titulo"]=$this->input->post('titulo');
            $nuevoreg["descripcion"]=$this->input->post('descripcion');
            //$nuevoreg["imgs"]=$this->input->post('imgs');
            $nuevoreg["user_id"]=$this->session->userdata('user_id');
            
            $ok=$this->carga_model->newReg($nuevoreg);
            if($ok){
                redirect('perfil');
            }else{
                return false;
            }
            
        }
    }
    
    /*==================================
     - Ésta función trae los datos para administrar una nota/registro - USUARIO
    ==================================*/
    
    public function admReg($registro_id=false){
        $this->datos['administrar']=$this->carga_model->admReg($registro_id);
        $this->load->view('administrar',$this->datos);
        
    }
    
    /*==================================
     - Ésta función se encarga de hacer un borrado lógico a las notas - USUARIO
    ==================================*/
    
    public function borrar($registro_id=false){
        $registro=$this->carga_model->borrar($registro_id);
        $this->datos=$this->session->set_flashdata('BAJA','Eliminado correctamente');
        redirect('perfil/viewreg');
    }
    
    /*==================================
     - Ésta función es para editar las notas - USUARIO
    ==================================*/
    
    public function editar($registro_id=false){
        
        $registro=array();
        //$registro['registro_id']=$registro_id;
        $registro['titulo']=$this->input->post('title');
        $registro['descripcion']=$this->input->post('description');
        
        $ok=$this->carga_model->editar($registro_id,$registro);
        
        if($ok){
            $this->datos=$this->session->set_flashdata('ACTUALIZADO','Actualizado correctamente');
            redirect('perfil/admReg/'.$registro_id);
        }else{
            return false;
        }
        
    }
    
    
    /*==================================
    --------------------------------- PANEL DE ADMINISTRADOR---------------------------------------
    
    
     - Ésta función trae una lista de usuarios - ADMIN
    ==================================*/
    
    public function listusers(){
        if($this->session->userdata('rol')=='U'){
            redirect('perfil');
        }
        $this->datos['usuarios']=$this->login_model->listusers();
        $this->load->view('listusers',$this->datos);
        
    }
    
    /*==================================
     - Ésta función trae una lista de registros - ADMIN
    ==================================*/
    
    public function listrecords(){
        if($this->session->userdata('rol')=='U'){
            redirect('perfil');
        }
        $this->datos['registros']=$this->carga_model->listrecords();
        $this->load->view('listrecords',$this->datos);
        
    }
    
    /*==================================
     - Ésta función trae una lista de los usuarios y de los registros/notas borrados/desactivados - ADMIN
    ==================================*/
    
    public function papelera_usuarios(){
        if($this->session->userdata('rol')=='U'){
            redirect ('perfil');
        }
        $this->datos['papelerau']=$this->carga_model->papelera_usuarios();
        $this->datos['papelerar']=$this->carga_model->papelera_registros();
        $this->load->view('papelera',$this->datos);
    }
    
    /*==================================
     - Ésta función se encarga de volver a activar una cuenta - ADMIN
    ==================================*/
    
    public function restablecer_usuario($user_id=""){
        $resultado=$this->carga_model->restablecer_usuario($user_id);
        
        if($resultado){
            redirect('perfil/papelera_usuarios');
        }else{
            redirect('perfil');
        }
    }
    
    /*==================================
     - Ésta función se encarga de deshacer el borrado de un registro/nota - ADMIN
    ==================================*/
    
    public function restablecer_registro($registro_id=""){
        $resultado=$this->carga_model->restablecer_registro($registro_id);
        
        if($resultado){
            redirect('perfil/papelera_usuarios');
        }else{
            redirect('perfil');
        }
    }
    
    /*==================================
     - Ésta función se encarga de editar un usuario desde el panel de administrador - ADMIN
    ==================================*/
        
    public function editar_usuario($user_id=""){
        $this->load->library('form_validation');

        $this->form_validation->set_rules('eusuario','Usuario','required');
        $this->form_validation->set_rules('epassword','Password','required');
        $this->form_validation->set_rules('eemail','Email','required');
        $this->form_validation->set_rules('erol','Rol','required');
        

        if ($this->form_validation->run() == FALSE){
           
            redirect('perfil/listusers');

        }else{
            $usuarioeditado=array();
            $usuarioeditado['user_id']=$user_id;
            $usuarioeditado["user"]=$this->input->post('eusuario');
            $usuarioeditado["pass"]=$this->input->post('epassword');
            $usuarioeditado["email"]=$this->input->post('eemail');
            $usuarioeditado["rol"]=$this->input->post('erol');
            
            $ok=$this->carga_model->editar_usuario($usuarioeditado);
            if($ok){
                redirect('perfil/listusers');
            }else{
                redirect('perfil/listusers');
            }
            
        }
    }
    
}
