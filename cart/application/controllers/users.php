<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_controller{
    
    function __construct() 
    { 
        parent::__construct();
        $this->load->model('Users_model'); 
        $this->load->library(array('session','form_validation'));   
		$this->load->library('table');		
        $this->form_validation->set_rules('name', 'Nombres', 'required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Apellidos', 'required|min_length[3]');              
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|md5');
        $this->form_validation->set_rules('passconf', 'Confirmar password', 'required|matches[password]|md5');
        $this->form_validation->set_message('required', 'el campo %s es requerido');
        $this->form_validation->set_message('matches', 'El password no coincide');           
        $this->form_validation->set_error_delimiters('<ul><li>', '</li></ul>');
   }
    
  function index(){
      
    $data['title'] = 'Administracion de Usuarios';
    $data['records'] = $this->Users_model->get_users();
    
    $this->load->view('admin/header_admin',$data);
    $this->load->view('admin/users');
    $this->load->view('front/footer');
    
   }
   
  function add(){ // Agregar usuarios
      
    $data['title'] = 'Registrar Usuario'; 
       
    $this->form_validation->set_rules('username', 'Usuario', 'required|callback__username_check|min_length[4]|max_length[15]');       
    $this->form_validation->set_message('_username_check', 'El usuario ya existe');
       
        if ($this->form_validation->run() == FALSE){           
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/add_user');
            $this->load->view('front/footer');       
        }else{
            $name = $this->input->post('name');
            $last_name = $this->input->post('last_name');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
                   
            $insert = $this->Users_model->add_user($name, $last_name, $username, $password);
                   
            $data['title'] = 'El usuario se agregó correctamente'; 
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/success');
            $this->load->view('front/footer');   
    
        }

} // fin del método   

  // Método privado
function _username_check($username){ // verificamos si el usario existe
        return $this->Users_model->username_check($username);
    }
    
function edit() // Método para tomar los datos del usuario y pasarlos al formulario de editar
    {   $id=$this->input->post('id'); 
       
        if($id!=''){
           
            $data['title'] = 'Editar Usuarios'; 
            $data['results'] = $this->Users_model->edit_user($id);
       
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/edit_user');
            $this->load->view('front/footer');          
       
        }else{ redirect('users');}   
       
    } // fin

function update(){ // Si los datos son válidos se actualiza el usuario de lo contrario se muestran los mensajes de error
    
        $data['title'] = 'Editar Usuario';
        $data['id'] = $this->input->post('id'); 
       
            $this->form_validation->set_rules('username', 'Usuario', 'required|callback__user_check|min_length[4]|max_length[15]');       
        $this->form_validation->set_message('_user_check', 'El nuevo Usuario que trata de tomar está en uso');
       
        if ($this->form_validation->run() == FALSE){           
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/edit_user');
            $this->load->view('front/footer');       
        }else{
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $last_name = $this->input->post('last_name');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
                   
            $insert = $this->Users_model->update_user($id, $name, $last_name, $username, $password);
           
        if($insert){
           
            $data['title'] = 'El usuario se actualizó correctamente'; 
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/success');
            $this->load->view('front/footer');
           
            }else{
               
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/edit_user');
            $this->load->view('front/footer');   
               
            }
    
        }
    
 }// fin update

    function _user_check($username)
    {
        if($id = $this->input->post('id')){
           
        return  $this->Users_model->user_check($username, $id);
       
        }
       

    }
    
function delete(){
    
     $id = $this->input->post('id');
     $delete= $this->Users_model->delete_user($id);
    
     if($delete){
        
            $data['title'] = 'El usuario se elimino correctamente'; 
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/success');
            $this->load->view('front/footer');
     }
    
}   
    
}