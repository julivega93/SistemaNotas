<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

    
    /* =============================
    Ésta función se encarga de validar los datos ingresados por el usuario al loguearse
    ================================= */
	public function login($user="",$pass=""){

        $this->db->where('user',$user);
        $this->db->where('pass',$pass);
        $this->db->limit(1);
        $result=$this->db->get('usuarios');

        
        return $result->row_array();
	}
    
    /* =============================
    Ésta función crea un nuevo usuario 
    ================================= */
    
    public function register($nuevo=false){
        $this->db->insert('usuarios',$nuevo);
        
        if($this->db->affected_rows()){
            return $this->db->insert_id();
        }else{
            return false;
        }
        
    }
    
    /* =============================
    Ésta función es para cambiar la contraseña, cada usuario puede hacerlo.
    ================================= */
    
    public function changePass($user_id,$changePass){
        $this->db->where('user_id',$user_id);
        $this->db->limit(1);
        $this->db->set('pass',$changePass);
        $result=$this->db->update('usuarios');
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
    /* =============================
    TAREAS ADMINISTRADOR: 

    Ésta función trae una lista de todos los usuarios creados (SÓLO VISIBLE POR ADMINISTRADOR)
    ================================= */
    
    public function listusers(){
        $this->db->where('rol','U');
        $this->db->where('state',1);
        $resultado=$this->db->get('usuarios');
        
        return $resultado->result_array();
    }
    
    /* =============================
    Ésta función se encarga de desactivar los usuarios (impide su inicio de sesion). - ADMIN
    ================================= */
    
    public function borrar($user_id=false,$logico=true){
        
        $this->db->where("user_id",$user_id);
        $this->db->limit(1);
        
        if($logico){
            $this->db->set('state',0);
            $this->db->update('usuarios');
        }else{

            $this->db->delete("usuarios");
        }
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
}
