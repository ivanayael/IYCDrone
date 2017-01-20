<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_controller extends CI_Controller {
  function __construct()
  { 
    parent::__Construct();
    $this->load->library(array('form_validation','email'));
    $this->load->helper(array('url','html'));
    $this->load->library('email'); 
  }

  function index()
  {
        
       $data['title'] = 'Contactese con nosotros'; 
       $data['msg'] = NULL;
	
       $this->form_validation->set_rules('name', 'Nombre', 'required|alpha|min_length[3]');
       $this->form_validation->set_rules('phone', 'Celular', 'required|numeric');
       $this->form_validation->set_rules('address', 'Direccion', 'required');
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email');   
       $this->form_validation->set_rules('message', 'Mensaje', 'required');   
      
       $this->form_validation->set_message('required', 'el campo %s es requerido');
       $this->form_validation->set_message('valid_email', 'El email no es valido');
          
           $this -> form_validation -> set_error_delimiters('<ul><li>', '</li></ul>');
      
       $this->form_validation->set_message('required', 'el campo %s es requerido');
       $this->form_validation->set_message('valid_email', 'El email no es valido');
          
           $this -> form_validation -> set_error_delimiters('<ul><li>', '</li></ul>');
       
       
    if ($this->form_validation->run() == FALSE)
        {
			   $this->load->view('front/header_mail', $data);
         $this->load->view('send_email', $data);  
			   $this->load->view('front/footer');
       } 
       else
       {
             $name = $this->input->post('name');
            $mobil = $this->input->post('phone');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $message = $this->input->post('message');

                       
        // Datos para enviar el correo
          
       // Configuracion de Email
  $config = Array(
     'protocol' => 'smtp',
     'smtp_host' => 'smtp.gmail.com.',
     'smtp_port' => 465,
     'smtp_user' => 'ivanaanime@gmail.com',
     'smtp_pass' => 'SakuraTsubasa123',
     'mailtype' => 'html',
     'charset' => 'iso-8859-1',
     'wordwrap' => TRUE
  ); 
 
  $this->load->library('email', $config);
  $this->email->set_newline("\r\n");
  $this->email->from('ivanaanime@gmail.com', "IYCDrone");
  $this->email->to($email);
  $this->email->cc("administrador@yopmail.com");
  $this->email->subject("Email de Contacto - IYCDrone");
  $this->email->message("Nombre: ".$name."<p>Direccion: ".$address."<p>Movil: ".$mobil."<p>Mensaje: ".$message."<p><p>Nos comunicaremos a la brevedad");


            if($this->email->send()){
           
            $data['title']='Mensaje Enviado';
            $data['msg'] = 'Mensaje enviado a su email';
           // echo $this->email->print_debugger(); exit;                             
            $this->load->view('send_email', $data); 
           
             }else{
                $data['title']='El mensaje no se pudo enviar';
                $this->load->view('send_email', $data); 
             
             } 
                         
           } 
        } 
    }