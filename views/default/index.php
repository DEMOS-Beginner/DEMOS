<div class="container">
	<h2 class='index_last_products'>
		Последние добавленные товары:
	</h2>

	<div class="index_products">
		<?php foreach($lastProducts as $product): ?>

			<div class="index_product">
				<a href="/products/<?=$product['id']?>">
					<img src="/images/products/<?=$product['image'];?>" width='200' alt="<?=$product['name']?>">
				</a>
				<a href='/products/<?=$product['id']?>' class='index_product_name'>
					<?= $product['name']; ?>
				</a>
				<p class='index_product_price'>
					<?= $product['price'] ?> 
					<i class='index_ruble'>
						&#x20bd <!--Символ рубля-->
					</i>
				</p>
			</div>

		<?php endforeach; ?>
	</div>	
</div>



