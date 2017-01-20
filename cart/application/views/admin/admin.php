<?=heading('Bienvenido: '.$user, 4);

$users = '<img src="'.base_url().'assets/img/users.png"/>';
$products = '<img src="'.base_url().'assets/img/products.png"/>';
$images = '<img src="'.base_url().'assets/img/images.jpg"/>';
$logout = '<img src="'.base_url().'assets/img/logout.png"/>';
?>
<div id="links">
	<div><?=anchor('users', 'Administrar Usuarios');?></div>
	<div><?=anchor('users', $users);?></div>
	<div><?=anchor('manage_products','Administrar Productos');?></div>
	<div><?=anchor('manage_products', $products);?></div>
	<div><?=anchor('upload', 'Subir Imagenes');?></div>
	<div><?=anchor('upload', $images);?></div>
	<div><?=anchor('login/logout', 'Cerar Sesión');?></div>
	<div><?=anchor('login/logout', $logout);?></div>
</div>
