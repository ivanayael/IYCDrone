<?=heading($title, 2);?>
<!DOCTYPE html>
<html>    
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?php echo $title;?></title>
<style type="text/css">

#error{
    width:400px; 
    border: 1px solid #bf0100;
    background-color: #FFEBE8;
    margin: 5px 30px 10px 30px;

}
</style>
</head>
<body>
<div>
<?php if(validation_errors()){ ?>
    
    <div id="error"><?php echo validation_errors();?></div>
    
<?php  } // fin del if que evalua los errores del formulario

  $attributes = array('id' => 'form_email');
  
   if($msg===NULL){
      
 echo form_open('email_controller', $attributes);

       $name = array('name'=>'name', 'id'=>'name','placeholder'=>'Nombre','value'=>set_value('name'), 'size'=> '35',);
       $phone = array('name'=>'phone', 'id'=>'phone','placeholder'=>'Telefono','value'=>set_value('phone'), 'size'=> '35',);
       $address = array('name'=>'address','id'=>'address','placeholder'=>'Ciudad y direccion','value'=>set_value('address'), 'size'=> '35',);
       $email = array('name'=>'email', 'id'=>'email','placeholder'=>'Email', 'value'=>set_value('email'), 'size'=> '35',);  
       $message =array('name'=>'message', 'cols'=>'50', 'id'=>'message','placeholder'=>'Mensaje...','value'=>set_value('message'),);
 ?> 
      <div><?php echo form_label('Nombre');?></div>
              
      <div><?php echo form_input($name);?></div> 
      <div><?php echo form_label('Telefono');?></div>   
      <div><?php echo form_input($phone);?></div> 
      <div><?php echo form_label('Direccion');?></div>  
      <div><?php echo form_input($address);?></div> 
      <div><?php echo form_label('Email');?></div> 
      <div><?php echo form_input($email);?></div> 
      <div><?php echo form_label('Mensaje');?></div>
      <div><?php echo form_textarea($message)?></div>     
<div>
    <?php echo form_submit('submit', 'Enviar');?>  
</div> 
<?php echo form_close();?>  

 <?php }else
           { echo anchor('email_controller','Enviar otro mensaje').br(2); 
       }?>
</div>
</body>
</html>