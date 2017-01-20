<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nosotros_controller extends CI_Controller {

    function __construct() { 
        parent::__Construct();
        $this->load->helper(array('url','html'));
       }

function index(){
        
       $data['title'] = 'Quienes somos'; 
       $data['msg'] = NULL;

			   $this->load->view('front/header_mail', $data);
               $this->load->view('quienes_somos', $data);  
			   $this->load->view('front/footer');
           

        } 
    }