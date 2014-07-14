<div class = "catalog">

<?php foreach ($results as $product) : ?>

<div class = "product-wrapper">
	<h3> 
		<a href="/boutique/transact/product/<?php echo $product['Product']['id']; ?>">
		<?php echo $product['Product']['name']; ?>
		</a>
	</h3>
	<p> <?php echo $product['Product']['details']; ?> </p>
	<div> <?php echo $product['Product']['price']; ?> </div>
</div>

<?php endforeach; ?>	
	
	
<?php	
 // pr($results);