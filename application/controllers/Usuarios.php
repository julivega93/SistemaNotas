<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


    protected $datos=array();
    
    /*==================================
     - Ésta función se encarga de validar que se haya iniciado sesión y de cargar las librerías y modelos necesarios.
    ==================================*/
    
    public function __construct(){
        parent::__construct();
        
        if($this->session->userdata('user_id')==NULL){
                
            redirect("inicio/login/NOAUTORIZADO");
        }

        $this->load->library('form_validation');
        $this->load->model('login_model');
        $this->load->library('session');
        
    }
    
	public function index()
	{
  
        redirect('usuarios/vistaPass');
    }
    
    public function vistaPass(){
        $this->load->view('changePass',$this->datos);
    }
    
    /*==================================
     - Ésta función valida el cambio de password - USUARIO
    ==================================*/
    
    public function changePass(){

        
        $this->form_validation->set_rules('changePass','ChangePass','required|trim|min_length[4]|max_length[12]');

        if ($this->form_validation->run() == FALSE){
            //$datos['user']=$this->input->set_value('user');         
            redirect('usuarios');
            
        }else{

            $changePass=$this->input->post('changePass');
            $user_id=$this->session->userdata('user_id');
            $ok=$this->login_model->changePass($user_id,$changePass);
            
            if($ok){
                $this->datos=$this->session->set_flashdata('CAMBIAPASS','Password actualizada con éxito!');
                $this->session->sess_destroy();
                $this->load->view('entrada',$this->datos);
            }else{
                redirect('usuarios');

            }
            
        }
    }
    
    /*==================================
     - Ésta función se encarga de borrar/desactivar un usuario - ADMIN
    ==================================*/
    
    public function borrar($user_id=false){
        $user_id=$this->login_model->borrar($user_id);
        
        redirect('perfil/listusers');
    }
    
    
}

