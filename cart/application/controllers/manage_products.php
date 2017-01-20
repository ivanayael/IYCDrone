<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_products extends CI_Controller {

    function __construct() { 
        parent::__Construct();
        $this->load->model('Products_Model');
        $this->load->library(array('pagination', 'form_validation', 'table'));
        $this->load->library('session');
        $this->form_validation->set_rules('marca', 'Marca', 'required|min_length[2]');
        $this->form_validation->set_rules('pantalla', 'Pantalla', 'required|min_length[2]');
        $this->form_validation->set_rules('ram', 'Memoria Ram', 'required|min_length[2]');
        $this->form_validation->set_rules('procesador', 'Procesador', 'required|min_length[2]');
        $this->form_validation->set_rules('disco_duro', 'Disco Duro', 'required|min_length[2]');
        $this->form_validation->set_rules('precio', 'Precio','required|min_length[4]');
        $this->form_validation->set_message('required', 'el campo %s es requerido');           
        $this->form_validation->set_error_delimiters('<ul><li>', '</li></ul>');
       
       }
   
function index(){
        
    $pagination = 6;
      //$config['base_url'] = base_url().'index.php/manage_products/index';    
        $config['base_url'] = base_url().'manage_products/index'; 
        $config['total_rows'] = $this->db->get('productos')->num_rows();
        $config['per_page'] = $pagination;
        $config['num_links'] = 20; 
        $config['next_link'] = 'Siguiente »';
        $config['prev_link'] = '« Anterior';
   
        $this->pagination->initialize($config);
       
    $this->table->set_heading('Producto','Detalles','Imagen','Editar','');
    $tmpl = array ( 'table_open'  => '<table border="1" id="table">' );
    $this->table->set_template($tmpl); 
         
    $data['title'] = 'Todos los Productos'; 
    $data['results'] = $this->Products_Model->get_products($pagination, $this->uri->segment(3));
       
    $this->load->view('admin/header_admin',$data);
    $this->load->view('admin/products/products');
    $this->load->view('front/footer');

  }

function edit(){
    $id = $this->input->get('product'); 
    $data['title'] = 'Editar Producto'; 
    $data['results'] = $this->Products_Model->get($id);
   
    $this->load->view('admin/header_admin',$data);
    $this->load->view('admin/products/edit_product');
    $this->load->view('front/footer');


}

function add(){

$data['title'] = 'Nuevo Producto';

    if ($this->form_validation->run() == FALSE){           
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/products/new_product');
            $this->load->view('front/footer');       
        }else{
            $insert = $this->Products_Model->update_product();
           
        if($insert){
           
            $data['title'] = 'El Producto se cre&oacute; correctamente.'; 
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/success');
            $this->load->view('front/footer');
           
            }else{
               
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/products/new_product');
            $this->load->view('front/footer');   
               
            }   
        }
}
  
function update(){

        $data['title'] = 'Editar Producto';
        $data['id'] = $this->input->post('id'); 

    if ($this->form_validation->run() == FALSE){           
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/products/edit_product');
            $this->load->view('front/footer');       
        }else{
       
            $insert = $this->Products_Model->update_product($this->input->post('id'));
           
        if($insert){
           
            $data['title'] = 'El Producto se actualiz&oacute; correctamente.'; 
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/success');
            $this->load->view('front/footer');
           
            }else{
               
            $this->load->view('admin/header_admin',$data);
            $this->load->view('admin/products/edit_product');
            $this->load->view('front/footer');   
               
            }   
        }

} 

function delete(){
    
        if(FALSE === ($products = $this->input->post('products'))){
            redirect('manage_products','location');
        }

        foreach($products as $product){
           
            $delete = $this->Products_Model->delete_product($product);

        }
   if($delete){  // Setiamos el mensaje utilizando flashdata.
    $this->session->set_flashdata('eliminado', 'El producto fue eliminado correctamente');
   }else{
       $this->session->set_flashdata('eliminado', 'El producto no pudo se eliminado');
   }
   redirect('manage_products','location'); // ó redirect('manage_products', 'refresh');
} 
 

}// fin de la clase