<?=heading($title,4);

$attributes = array('id' => 'form_login', 'class'=>'users'); 

$marca = array('name'=>'marca', 'id'=>'marca','class'=>'input','placeholder'=>'Marca',
                      'value'=>set_value('marca'), 'size'=> '35');   

$pantalla = array('name'=>'pantalla', 'id'=>'pantalla','class'=>'input','placeholder'=>'Pantalla',
                      'value'=>set_value('pantalla'), 'size'=> '35');
                     
$ram = array('name'=>'ram', 'id'=>'ram','class'=>'input','placeholder'=>'Memoria Ram',
                      'value'=>set_value('ram'), 'size'=> '35');   

$procesador = array('name'=>'procesador', 'id'=>'procesador','class'=>'input','placeholder'=>'Procesador',
                      'value'=>set_value('procesador'), 'size'=> '35');                         

$disco_duro = array('name'=>'disco_duro', 'id'=>'disco_duro','class'=>'input','placeholder'=>'Disco Duro',
                      'value'=>set_value('disco_duro'), 'size'=> '35');   
                     
$precio = array('name'=>'precio', 'id'=>'precio','class'=>'input','placeholder'=>'Precio',
                      'value'=>set_value('precio'), 'size'=> '35');                     

$opcion = array('name'=>'opcion', 'id'=>'opcion','class'=>'input','placeholder'=>'Opci&oacute;n del atributo',
                      'value'=>set_value('opcion'), 'size'=> '35');   
                                                         
                     
$atributos = array('name'=>'atributos', 'id'=>'atributos','class'=>'input','placeholder'=>'Atributos del producto',
                      'value'=>set_value('atributos'), 'size'=> '35');    

$imagen = array('name'=>'imagen', 'id'=>'imagen','class'=>'input','placeholder'=>'Imagen del producto',
                      'value'=>set_value('imagen'), 'size'=> '35');                    
                     
$data = array('name'=>'id', 'value'=>set_value('id'));                     

if(validation_errors()){ ?> 
   
<div id="error"><?=validation_errors();?></div>

<?php } ?>

<?=form_open('manage_products/add', $attributes);?>

<div class="padding"><?=form_label('Marca');?></div>
<div class="padding"><?=form_input($marca)?></div>

<div class="padding"><?=form_label('Pantalla')?></div>
<div class="padding"><?=form_input($pantalla)?></div>

<div class="padding"><?=form_label('Memoria Ram')?></div>
<div class="padding"><?=form_input($ram)?></div>

<div class="padding"><?=form_label('Procesador')?></div>
<div class="padding"><?=form_input($procesador)?></div>

<div class="padding"><?=form_label('Disco duro')?></div>
<div class="padding"><?=form_input($disco_duro)?></div>

<div class="padding"><?=form_label('Precio')?></div>
<div class="padding"><?=form_input($precio)?></div>

<div class="padding"><?=form_label('Opci&oacute;n del atributo - Ej. Color')?></div>
<div class="padding"><?=form_input($opcion)?></div>

<div class="padding"><?=form_label('Atributo(s) - Ej. Azul,verde')?></div>
<div class="padding"><?=form_input($atributos)?></div>


<div class="padding"><?=form_label('Imagen - Ej. HELICOPTERO.jpg')?></div>
<div class="padding"><?=form_input($imagen)?></div>

<?=form_submit(array('name' => 'submit','class'=>'submit','value' => 'Guardar'))?>

<?=form_close();?>

<div class="clear"></div>