<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_Model extends CI_Model {

function get_products($pagination, $segment) {
   
  $this->db->order_by('marca', 'asc');    
  $this->db->limit($pagination, $segment);
  $query = $this->db->get('productos')->result();
    
          foreach ($query as $result) {
           
            if ($result->valores) {
                $result->valores = explode(',',$result->valores);
            }
           
        }
       
    return $query;         
}
  
function get_product($id) {
       
        $query = $this->db->get_where('productos', array('id' => $id))->result();
           
        $result = $query[0];
       
        if ($result->valores) {
            $result->valores = explode(',',$result->valores);
        }
               
        return $result;
    }

function get($id){
   $query = $this->db->get_where('productos', array('id' => $id))->result();
   return $query;
  
}   

function update_product($id=NULL){

        $data = array(
               'marca' => $this->input->post('marca'),
               'pantalla' => $this->input->post('pantalla'),
               'ram' => $this->input->post('ram'),
               'procesador' => $this->input->post('procesador'),
               'disco_duro' => $this->input->post('disco_duro'),
               'precio' => $this->input->post('precio'),
               'opcion' => $this->input->post('opcion'),
               'valores' => $this->input->post('atributos'),
               'imagen' => $this->input->post('imagen')
               //linea añadida
            );
           
if($id!==NULL){
  $this->db->where('id', $id);
  return $this->db->update('productos', $data);
}else{
   return $this->db->insert('productos', $data);
}
   
}


function delete_product($id){
    
return $this->db->delete('productos', array('id' => $id));   
    
}
         
       
}