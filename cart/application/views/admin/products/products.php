<?=heading($title, 2);
$eliminado = $this->session->flashdata('eliminado'); // Tomamos el mensaje que setiamos en el controlador
if($eliminado)
echo $eliminado;
?>   
<div class="all_products">   
<p align="center"><?=anchor('manage_products/add/' ,'Nuevo Producto', 'title="Agregar Producto"') ?></p>           
<?php 
$edit_img = '<img src="'. base_url().'assets/img/edit.png"/>'; 
$img = '<img src="'. base_url().'assets/img/image.png"/>'; 

$check = array('id'=>'check','name'=>'check','value'=>1,'checked'=>FAlSE);

$atributo_link = 'class="link"';
$atributo_img = 'title="Cambiar la Imagen del Producto"';

echo form_open('manage_products/delete');
      foreach($results as $result){
           $details = 'Pantalla: '.$result->pantalla.br(1).'Ram: '.$result->ram.br(1).'Procesador: '.$result->procesador.br(1).'Disco Duro: '.$result->disco_duro;
       
        if($result->imagen ===''){
        $product_img = $img;       
        }else{
         $product_img = img(base_url().'images/'.$result->imagen);
        }
            $this->table->add_row('<strong>'.$result->marca.'</strong>',                               
                                $details,
                                // Para hacer link dinamicos (no realizado por falta de tiempo)
                               //   anchor('manage_products/image?product='.$result->id, $product_img, $atributo_img),
                                $product_img,
                                anchor('manage_products/edit?product='.$result->id, $edit_img, $atributo_link ),
                                $delete  = form_checkbox('products[]',$result->id, FALSE)                       
                                 );                                                 
     } // fin foreach
           
echo $this->table->generate();  
?>
<div class="actions">
  <strong>Marcar<?=form_checkbox($check)?></strong>
  <strong class="delete_user" onClick="return confirm('Esta seguro de eliminar los registros?');"><?=form_submit('action', 'Eliminar')?></strong>
</div>
<?php echo form_close()?>
<div id="pagination"><?=$this->pagination->create_links();?></div>
<script type="text/javascript">
// *** Funciones con jQuery
$(document).ready(function(){

    var products = $('#table :checkbox');  // alert(products.length); 
    var check = $('#check'); 
// **** Función para seleccionar y deseleccionar los productos      
check.click(function(){   
    var j = 0;
    var option = $('#check:checked').val();
    
  if(option==1){
     products.each(function(){
        products[j].checked=1;
        j++;
        });
    }else{
    
     products.each(function(){
        products[j].checked=0;
        j++;
        });
    
    } // fin if
    
    
 });


});   
</script>
</div>    