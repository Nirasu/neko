<div class="cart_wrapper">

<?php pr ($bill); 
		die('Allo');
?>
		

	<div class="info">
		<h3><?php echo $bill['User']['name']?></h3>
	</div>

	<table>
		<tr>
			<th>Nom Produit</th>
			<th>Cout Unitaire</th>
			<th>Quantite</th>
			<th>Total</th>
		</tr>
		
		<?php foreach ($bill['Product'] as $product) : ?>
		
		<tr>
			<td><?php echo $product['name'];?></td>
			<td><?php echo $product['price'];?></td>
			<td><?php echo $product['BillsProduct']['quantity'];?></td>
			<td><?php echo $product['price'] * $product['BillsProduct']['quantity'];?></td>
			<td><?php ?></td>			
		</tr>

		<?php endforeach; ?>	
	</table>
</div>	