<div class="container">
	<div class="cart_categories_block">
		<a href="/">Главная</a> - <span>Моя корзина </span>
	</div>
	<h2 class = 'cart_page_name'> МОЯ КОРЗИНА </h2>

	<?php if (count($cartProducts) < 1): ?>
		<h3>
			Ваша корзина пуста
		</h3>
	<?php else: ?>
		<table class='cart_table'>
			<thead>
				<tr class='cart_table_row'>
					<td></td>
					<td>Товар</td>
					<td>Цвет</td>
					<td>Количество</td>
					<td>Цена</td>			
				</tr>
			</thead>
		<?php $showed = array();
			foreach ($cartProducts as $product): 
				if (!in_array($product, $showed)): ?>
					<tr class='cart_table_row'>
						<td>
							<img src="/images/products/<?=$product['image'];?>"
							class = 'cart_product_image'
							width='50'
							alt="<?=$product['name']?>"
							>	
						</td>
						<td>
							<a class = 'cart_product_link' href="/products/<?=$product['id']?>">
							<?=$product['name']?>
							</a>
						</td>
						<td>
							<select name="color" id="cartSelectColor_<?=$product['id']?>"></select>
						</td>
						<td class='cart_count_block'>
							<a class='cart_edit' href="#" onclick='removeOneFromCart(<?=$product['id']?>); return false;'>
								-
							</a>
							<span id="prodCount_<?=$product['id']?>">
								<?php echo array_count_values($_SESSION['cart'])[$product['id']];?></span>
							<a class='cart_edit' href="#" onclick='addOneToCart(<?=$product['id']?>); return false;'>
								+
							</a>
						</td>
						<td>
							<span id="prodPrice_<?=$product['id']?>">
								<?=$product['price']*array_count_values($_SESSION['cart'])[$product['id']];?>								
							</span>
							<span class="hideme" id='prodTruePrice_<?=$product['id']?>'>
								<?=$product['price']?>			
							</span>
						</td>
					</tr>

		<?php
			$showed[] = $product;
			endif;
			endforeach; ?>
		</table>
	<?php endif; ?>
</div>