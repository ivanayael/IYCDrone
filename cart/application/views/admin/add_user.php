<?=heading($title,4);

$attributes = array('id' => 'form_login', 'class'=>'users'); 

    $name = array('name'=>'name', 'id'=>'name','class'=>'input','placeholder'=>'Nombres',
                      'value'=>set_value('name'), 'size'=> '35',);
                     
    $last_name = array('name'=>'last_name', 'id'=>'last_name','class'=>'input','placeholder'=>'Apellidos',
                      'value'=>set_value('last_name'), 'size'=> '35',);
                     
    $username = array('name'=>'username', 'id'=>'username','class'=>'input','placeholder'=>'Usuario',
                      'value'=>set_value('username'), 'size'=> '35',);
                     
    $password = array('name'=>'password', 'id'=>'password','class'=>'input','placeholder'=>'Contrase&#241a',
                      'type'=>'password', 'size'=> '35',);
                     
    $passconf = array('name'=>'passconf', 'id'=>'passconf','class'=>'input','placeholder'=>'Repita la Contrase&#241a',
                      'type'=>'password', 'size'=> '35',);
                   

if(validation_errors()):      
 ?> 
<div id="error"><?=validation_errors();?></div>
<?php endif ?>

<?=form_open('users/add', $attributes);?>   
<div class="padding"><?=form_label('Nombres');?></div>
<div class="padding"><?=form_input($name);?></div>
<div class="padding"><?=form_label('Apellidos')?></div>
<div class="padding"><?=form_input($last_name)?></div>
<div class="padding"><?=form_label('Usuario')?></div>
<div class="padding"><?=form_input($username)?></div>
<div class="padding"><?=form_label('Password')?></div>
<div class="padding"><?=form_input($password)?></div>
<div class="padding"><?=form_label('Confirmar Password')?></div>
<div class="padding"><?=form_input($passconf)?></div>

<?=form_submit(array('name' => 'submit','class'=>'submit','value' => 'Guardar'))?>
<?=form_close();?>
<div class="clear"></div>