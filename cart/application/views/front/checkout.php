<?php if($this->cart->contents()){ // el formulario se puede ver solo si existe el carrito?>
<?=heading($title, 2).'Por favor llene el formulario que muy pronto le contactaremos para enviar su pedido.';?>
<?php if(validation_errors()): ?>
	
	<div id="error"><?=validation_errors();?></div>
	
<?php endif ?>

<?php $attributes = array('id' => 'form_checkout'); ?>
<div id="checkout">
<?=form_open('products/checkout', $attributes);

       $name = array('name'=>'name', 'id'=>'name','placeholder'=>'Nombre y apellidos','value'=>set_value('name'), 'size'=> '35',);
       $phone = array('name'=>'phone', 'id'=>'phone','placeholder'=>'Teléfono o celular','value'=>set_value('phone'), 'size'=> '35',);
	   $address = array('name'=>'address','id'=>'address','placeholder'=>'Ciudad y dirección','value'=>set_value('address'), 'size'=> '48',);
	   $email = array('name'=>'email', 'id'=>'email','placeholder'=>'Correo electronico', 'value'=>set_value('email'), 'size'=> '48',);  
 ?> 
      <div><?=form_label('Nombre');?></div>                 
      <div><?=form_input($name);?></div> 
      <div><?=form_label('Celular');?></div>  
      <div><?=form_input($phone);?></div> 
      <div><?=form_label('Ciudad y direccción');?></div>  
	  <div><?=form_input($address);?></div> 
      <div><?=form_label('Email');?></div>    
      <div><?=form_input($email);?></div> 
      
<div id='button'>
	<?=form_submit('submit', 'Enviar');?>  
</div> 
<?=form_close();?>  
 
</div>   
<?php }

else{
	  redirect('products');
}
?>        