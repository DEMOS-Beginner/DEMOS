<h2 class='last_products'>
	Последние добавленные товары:
</h2>
<div class="container">
	<div class="products">
		<?php foreach($lastProducts as $product): ?>
			<div class="product">
				<a href="/products/<?=$product['id']?>">
					<img src="/images/products/<?=$product['image'];?>" width='200' alt="<?=$product['name']?>">
				</a>
				<a href='/products/<?=$product['id']?>' class='product_name'> <?= $product['name']; ?> </a>
				<p class = 'product_price'> <?= $product['price'] ?> 
					<i class = 'ruble'>
						&#x20bd <!--Символ рубля-->
					</i>
				</p>
			</div>
		<?php endforeach; ?>
	</div>	
</div>



