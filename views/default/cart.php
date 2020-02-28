<a href="/">Главная</a> - <span class='cart_top_span'>Моя корзина </span>
<h2> МОЯ КОРЗИНА </h2>

<?php if (count($cartProducts) < 1): ?>
	<h3>
		Ваша корзина пуста
	</h3>
<?php else: ?>
	<table>
		<tr>
			<td>Товар</td>
			<td>Цвет</td>
			<td>Количество</td>
			<td>Цена</td>
		</tr>
	<?php foreach ($cartProducts as $product): ?>
		<tr>
			<td><?=$product['name']?></td>
			<td></td>
			<td>
				<a href="#"> < </a>
				<span id="prodCount_<?=$product['id']?>">1</span>
				<a href="#"> > </a>
			</td>
			<td><?=$product['price']?></td>
		</tr>
	<?php  endforeach; ?>
	</table>
<?php endif; ?>