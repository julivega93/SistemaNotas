<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carga_model extends CI_Model {

    
    /* =============================
    Esta función agrega un nuevo 'registro' cargado por el usuario, a la base de datos
    ================================= */
    
    public function newReg($nuevoreg=""){

        $this->db->insert('registros',$nuevoreg);
        
        if($this->db->affected_rows()){
            return $this->db->insert_id();
        }else{
            return false;
        }
        
    }
    
    /* =============================
    Ésta función muestra los registros en cada perfil de cada usuario
    ================================= */
    
    public function viewReg($user_id="",$borrados=false){
        //$this->db->join("registros","usuarios.user_id=registros.user_id","inner");
        $this->db->where('user_id',$this->session->userdata('user_id'));
        $this->db->order_by('fecha','DESC');
        
        if($borrados){
            $this->db->where('borrado',1);
        }else{
            $this->db->where('borrado',0);
        }
        
        $resultado=$this->db->get('registros');
        return $resultado->result_array();
    }
    
    /* =============================
    Ésta función se encarga de traernos el registro que queremos 'Administrar'
    ================================= */
    
    public function admReg($registro_id=""){
        $this->db->where('registro_id',$registro_id);
        $this->db->limit(1);
        $resultado=$this->db->get('registros');
        
        return $resultado->result_array();
    }
    
    /* =============================
    Ésta función realiza el borrado lógico de los registros.
    ================================= */
    
    public function borrar($registro_id=false,$logico=true){
        
        $this->db->where("registro_id",$registro_id);
        $this->db->limit(1);
        
        if($logico){
            $this->db->set('borrado',1);
            $this->db->update('registros');
        }else{
            $this->db->delete("registros");
        }
        
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
    /* =============================
    Ésta función es para que cada usuario edite su propio registro, y actualiza la bd
    ================================= */
    public function editar($registro_id,$registro){
        
        $this->db->where("registro_id",$registro_id);
        $this->db->set("titulo",$registro['titulo']);
        $this->db->set("descripcion",$registro['descripcion']);
        $this->db->update('registros');
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
    /* =============================
    Ésta función muestra todos los registros creados por los usuarios (SÓLO VISIBLE POR ADMINISTRADOR)
    ================================= */
    public function listrecords(){
        $this->db->where('borrado',0);
        $resultado=$this->db->get('registros');
        
        return $resultado->result_array();
    }
    
    /*==================================
     - Ésta función trae de la BD todos los usuarios borrados/desactivados - ADMIN
    ==================================*/
    
    public function papelera_usuarios(){
        $this->db->where('state',0);
        $resultado=$this->db->get('usuarios');
        
        return $resultado->result_array();
    }
    
    /*==================================
     - Ésta función trae de la BD todos los registros/notas borrados/desactivados - ADMIN
    ==================================*/
    
    public function papelera_registros(){
        $this->db->where('borrado',1);
        $resultado=$this->db->get('registros');
        
        return $resultado->result_array();
    }
    
    /*==================================
     - Ésta función actualiza la BD desactivando un usuario - ADMIN
    ==================================*/
    
    public function restablecer_usuario($user_id=""){
        $this->db->where('user_id',$user_id);
        $this->db->limit(1);
        $this->db->set('state',1);
        $this->db->update('usuarios');
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
    /*==================================
     - Ésta función actualiza la BD deshaciendo el borrado de una nota - ADMIN
    ==================================*/
    
    public function restablecer_registro($registro_id=""){
        $this->db->where('registro_id',$registro_id);
        $this->db->limit(1);
        $this->db->set('borrado',0);
        $this->db->update('registros');
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
    /*==================================
     - Ésta función actualiza la BD editando un usuario desde el panel de administrador - ADMIN
    ==================================*/
    
    public function editar_usuario($usuarioeditado=""){
        $this->db->where('user_id',$usuarioeditado['user_id']);
        $this->db->set('user',$usuarioeditado['user']);
        $this->db->set('pass',$usuarioeditado['pass']);
        $this->db->set('email',$usuarioeditado['email']);
        $this->db->set('rol',$usuarioeditado['rol']);
        $this->db->update('usuarios');
        
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
        
    }
}
?>
