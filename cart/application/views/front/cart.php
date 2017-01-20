<?=heading($title, 2);?>
	<?php   if($message){echo $message;} 
	if ($cart = $this->cart->contents()):   ?>		
<div id="cart">
<table cellpadding="4" cellspacing="1" style="width:70%" border="1">
<tr>
  <th>Portatil</th><th>Detalle</th><th>Cantidad</th><th colspan="3">Sub-Total</th>
</tr>
		<?php foreach($cart as $item): ?>
			<tr>
				<td><?=$item['name']; ?></td>
				<td>
					<?php if ($this->cart->has_options($item['rowid'])) {
						foreach ($this->cart->product_options($item['rowid']) as $option => $value) {
							echo $option . ": <em>" . $value . "</em>";
						}
						
					} ?>
				</td>
				<td><?=$item['qty']; ?></td>
				<td>$<?=$this->cart->format_number($item['subtotal'])?></td>
					<td class="add">
					<?php 
					  $row = $item['rowid']."-".($item['qty']+1);
					echo anchor('products/update_cart/'.$row,'+'); ?>
				</td>
				<td class="remove">
					<?=anchor('products/remove/'.$item['rowid'],'X');?>
				</td>
				  
	</tr>
			
		<?php endforeach; ?>
		<tr>
			<td colspan="2" ><strong>Total</strong></td>
			<td colspan="1"><strong><?=$this->cart->total_items()?></strong></td>
			<td colspan="5"><strong>$<?=$this->cart->format_number($this->cart->total());?></strong></td>
				
		</tr>
		<tr>
			<td colspan="2" class="pedido"><?=anchor('products/checkout/','Comprar Pedido'); ?></td>
			<td class="remove" colspan="4"><?=anchor('products/delete/','Vaciar Carrito'); ?></td>		    
		</tr>
	
		</table>		
	</div>
		
	<?php endif; ?>
<?=br(1).anchor('products','Regresar'); ?>	