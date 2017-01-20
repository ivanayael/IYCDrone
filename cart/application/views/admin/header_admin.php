<?php
     $logued = $this->session->userdata('logued_in');
	 $session = $this->session->userdata('session_id');
    
if($logued === FALSE || $session === FALSE ){ /* por seguridad hacemos doble verificación; aunque estas 
                                               * 2 variables siempre van a tener el mismo estado */
	redirect('login'); exit();
	
 } 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title><?=$title?></title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/template/style.css"/>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 $('tr:odd').css('background', '#e3e3e3');
});	
</script>
</head>
<body>
	<div id="container">
<div id="header">
	<h1>Venta de Drones - IYCDrone</h1>
</div><!-- End Header -->
<div id="menu">
	<ul>
		<li><?=anchor('login','Administrador');?></li>
		<li><?=anchor('users','Usuarios');?></li>
		<li><?=anchor('manage_products','Productos');?></li>
		<li><?=anchor('upload','Imagenes');?></li>
		<li class="cart_menu"><?=anchor('login/logout', 'Cerrar Sesion');?></li>
	</ul>
</div><!-- End Menu -->
<div id="content">