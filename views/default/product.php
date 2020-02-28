<div class="container">
	<div class="product_categories_block">
		<a href="#"> Главная </a> -
		<a href="#"> Кубы NXNXN </a> -
		<a href="#"> 3x3 </a> -
		<a href="#"> Qiyi Mofangge </a> -
		<span> <?=$product['name']?> </span>	
	</div>

	<section class="product_section">
		<div class="product_about">
			<h1 class='product_name'>
				<?=$product['name']?>
			</h1>

			<img src="/images/products/<?=$product['image'];?>"
				class = 'product_image'
				width='250'
				alt="<?=$product['name']?>"
			>			
		</div>

		<div class="product_buy">
			<div class="product_price_block">
				<span class='product_price'>
					<?=$product['price']?>
				</span>

				<span class="product_ruble">
					&#x20bd
				</span>	
			</div>

			<div class="product_setcolor_block">
				<p> Цвет: </p>
			</div>

			<div class="product_buy_block">
				<a
					id = "addToCart_<?=$product['id']?>"
					onclick = 'addToCart(<?=$product['id']?>); return false;'
					href = '#'
					<?php if (in_array($product['id'], $_SESSION['cart'])): ?>
						class = 'hideme' 
					<?php endif; ?>
					>
					Добавить
				</a>

				<a
					id = "removeFromCart_<?=$product['id']?>"
					onclick = 'removeFromCart(<?=$product['id']?>); return false;'
					href = '#'
					<?php if (!in_array($product['id'], $_SESSION['cart'])):?>
						class = 'hideme'
					<?php endif;?>
					>
					Убрать
				</a>	
			</div>
			<div class="product_transport_block">
				<span>Ваш город: Братск</span>
				<p>Доставка курьером</p>
				<p>Забрать из пункта выдачи</p>
				<p>Почта России</p>
			</div>
		
		</div>
	</section>	
</div>


<p>
	<?=$product['description']?>
</p>
