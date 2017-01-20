<?=heading($title, 2);
   $new_img = '<img src="'. base_url().'assets/img/user.png"/>'; ?>
<div class="container_table">
    <p align="center"><?=anchor('users/add/' ,'Nuevo '.$new_img, 'title="Agregar Usuario"') ?></p>
    
<?php

$edit_img = '<img src="'. base_url().'assets/img/edit.png"/>'; 
$delete_img = '<img src="'. base_url().'assets/img/delete.png"/>'; 

    $this->table->set_heading('Nombres', 'Apellidos','Usuario', $edit_img, $delete_img);
    $tmpl = array ( 'table_open'  => '<table border="1">' );
    $this->table->set_template($tmpl); 

$attributes = array('class' => 'edit_user');
$attributes2 = array('class' => 'delete_user');

$j = 0;

foreach($records as $record){
    
 if($j<1){ 
     $delete = '-';
 }else{
     $delete = form_open('users/delete',$attributes2).form_hidden('id', $record->id).form_submit('action', 'Eliminar').form_close();
 }   

    $this->table->add_row($record->name,
                          $record->last_name,
                          $record->username,
                          form_open('users/edit',$attributes).form_hidden('id', $record->id).form_submit('action', 'Editar').form_close(),
                          $delete
                         );                                 
$j++;                                      
}

echo $this->table->generate();
?>
</div>