<div class = "product-wrapper">

	<h3> 
		<?php echo $product['Product']['name']; ?> 
	</h3>
	<p> <?php echo $product['Product']['details']; ?> </p>
	<div> <?php echo $product['Product']['price']; ?> </div>
	<div> <?php echo $product['Product']['sku']; ?> </div>
	
	<?php
	
		echo $this->Form->create('BillsProduct', array('url' => array('controller' => 'transact','action' => 'action_add_to_cart')));
		
		echo $this->Form->hidden('product_id', array('value' => $product['Product']['id']));
		echo $this->Form->input('quantity');
		
		echo $this->Form->end('Add to cart');
	
	?>
	
</div>