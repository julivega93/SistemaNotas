<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    protected $datos=array();
    
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('login_model');
        $this->load->library('session');
    }
    
	public function index()
	{
		redirect('inicio/login');
	}
    
    /*==================================
     - Ésta función valida el ingreso al sistema.
    ==================================*/
    
    public function login(){
        
 
        
        $this->form_validation->set_rules('user','User','required|trim|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('pass','Pass','required|trim|min_length[4]|max_length[12]');

        if ($this->form_validation->run() == FALSE){
            //$datos['user']=$this->input->set_value('user');
            
            $this->load->view('entrada',$this->datos);

        }else{
            

            if($ok=$this->login_model->login(set_value('user'),set_value('pass'))){
                $this->session->set_userdata('user_id',$ok['user_id']);
                $this->session->set_userdata('user',$ok['user']);
                $this->session->set_userdata('rol',$ok['rol']);
                $this->session->set_userdata('state',$ok['state']);
                redirect('perfil/index');
            }else{
                $this->datos=$this->session->set_flashdata('ERROR','Cuenta incorrecta');
                redirect('inicio/login');
            }
        }
    }
    
    /*==================================
     - Ésta función valida la creación de una nueva cuenta.
    ==================================*/
    
    public function registro(){

        
        $this->form_validation->set_rules('username','Username','required|trim|min_length[4]|max_length[12]|is_unique[usuarios.user]');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[4]|max_length[12]');
        $this->form_validation->set_rules('passwordconf','Password Confirm','required|matches[password]');
        $this->form_validation->set_rules('email','Email','required');
        

        if ($this->form_validation->run() == FALSE){
            //$datos['user']=$this->input->set_value('user');
            $this->load->view('registro',$this->datos);

        }else{
            $nuevo=array();
            $nuevo["user"]=$this->input->post('username');
            $nuevo["pass"]=$this->input->post('password');
            $nuevo["email"]=$this->input->post('email');
            
            $ok=$this->login_model->register($nuevo);
            
            if($ok){
                $this->datos=$this->session->set_flashdata('CUENTACREADA','Cuenta creada con éxito');
                redirect("inicio/login");
            }else{
                redirect('registro');
            }
        }
    }
}
