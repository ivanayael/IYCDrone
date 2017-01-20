<?=heading($title,4);

$attributes = array('id' => 'form_login', 'class'=>'users'); 

    $name = array('name'=>'name', 'id'=>'name','class'=>'input','placeholder'=>'Nombres',
                      'value'=>set_value('name'), 'size'=> '35');                                                             
    $last_name = array('name'=>'last_name', 'id'=>'last_name','class'=>'input','placeholder'=>'Apellidos',
                      'value'=>set_value('last_name'), 'size'=> '35');                     
    $username = array('name'=>'username', 'id'=>'username','class'=>'input','placeholder'=>'Usuario',
                      'value'=>set_value('username'), 'size'=> '35');                     
    $password = array('name'=>'password', 'id'=>'password','class'=>'input','placeholder'=>'Contraseña',
                      'type'=>'password', 'size'=> '35');                     
    $passconf = array('name'=>'passconf', 'id'=>'passconf','class'=>'input','placeholder'=>'Repita la Contraseña',
                      'type'=>'password', 'size'=> '35');
    $data = array('name'=>'id', 'value'=>set_value('id'));                     

if(validation_errors()){ ?> 
    
<div id="error"><?=validation_errors();?></div>

<?php }else{
    

      foreach ($results as $result){
         
           $id = $result->id;             
           $name['value'] = $result->name;
           $last_name['value'] = $result->last_name;
           $username['value'] = $result->username;
                     
     }
    
} 
?>

<?=form_open('users/update', $attributes);?>

<div class="padding"><?=form_label('Nombres');?></div>
<div class="padding"><?=form_input($name)?></div>
<div class="padding"><?=form_label('Apellidos')?></div>
<div class="padding"><?=form_input($last_name)?></div>
<div class="padding"><?=form_label('Usuario')?></div>
<div class="padding"><?=form_input($username)?></div>
<div class="padding"><?=form_label('Nuevo Password')?></div>
<div class="padding"><?=form_input($password)?></div>
<div class="padding"><?=form_label('Confirmar Password')?></div>
<div class="padding"><?=form_input($passconf)?></div>
<?=form_hidden('id',$id)?>

<?=form_submit(array('name' => 'submit','class'=>'submit','value' => 'Modificar'))?>

<?=form_close();?>

<div class="clear"></div>