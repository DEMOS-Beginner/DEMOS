<h1>
	<?=$product['name']?>
</h1>
<img src="/images/products/<?=$product['image'];?>" width='250' alt="<?=$product['name']?>">
<a
	id = "addToCart_<?=$product['id']?>"
	onclick = 'addToCart(<?=$product['id']?>); return false;'
	href = '#'
	<?php if (in_array($product['id'], $_SESSION['cart'])):?>
		class = 'hideme'
	<?php endif;?>>
	Добавить в корзину
</a>
<a
	id = "removeFromCart_<?=$product['id']?>"
	onclick = 'removeFromCart(<?=$product['id']?>); return false;'
	href = '#'
	<?php if (!in_array($product['id'], $_SESSION['cart'])):?>
		class = 'hideme'
	<?php endif;?>>
	Удалить из корзины
</a>

<div>
	<span>
		<?=$product['price']?>
	</span>
</div>
<p>
	<?=$product['description']?>
</p>
