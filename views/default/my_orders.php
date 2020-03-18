<div class="container user_orders_block">
	<nav class="user_navbar">
		<ul>
			<li>
				<a href="#">
					МОИ ЗАКАЗЫ
				</a>
			</li>
			<li>
				<a href="#">
					РЕФЕРАЛЬНАЯ ПРОГРАММА				
				</a>
			</li>
			<li>
				<a href="#">
					МОЯ КОЛЛЕКЦИЯ				
				</a>
			</li>
			<li>
				<a href="#">
					ЛИЧНЫЕ ДАННЫЕ				
				</a>
			</li>
		</ul>
	</nav>
	<div class="user_orders">
		<div class="user_orders_pages_block">
			<a href="/" class='user_orders_nav_link'> Главная -</a>
			<a href="#" class='user_orders_nav_link'> Кубы NXNXN -</a>
			<a href="#" class='user_orders_nav_link'> 3x3 -</a>
			<a href="#" class='user_orders_nav_link'> Qiyi Mofangge -</a>
			<span class='user_orders_nav_link'> <?=$product['name']?> </span>	
		</div>
		<div class="user_orders_heading_switch">
			<h1 class='user_orders_heading'>Мои заказы</h1>	
			<a href="#" class="user_orders_switch active" onclick='showOrders();' id='newOrdersLink'>Текущие</a>	
			<a href="#" class="user_orders_switch" onclick='showOrders();' id='oldOrdersLink'>История</a>
		</div>

		<table class='user_orders_table' id='newOrdersTable'>
			<tr class='user_orders_thead'>
				<td>СОСТОЯНИЕ</td>
				<td>№ ЗАКАЗА</td>
				<td>ВРЕМЯ СОЗДАНИЯ</td>
				<td>СПОСОБ ДОСТАВКИ</td>
				<td>СУММА ЗАКАЗА</td>
			</tr>
			<tr>
				<?php foreach ($userOrders as $order): 
					if ($order['status'] != 'ОТМЕНЁН'):?>
					<tr class='user_orders_tbody'>
						<td><?=$order['status']?></td>
						<td>
							<a href="/order/<?=$order['id']?>" class="user_orders_order_id">
								<?=$order['id']?>							
							</a>
						</td>
						<td><?=$order['data_created']?></td>
						<td><?=$order['delivery']?></td>
						<td>
							<span class="user_orders_order_price">
								<?=$order['real_price']?>								
							</span>
							<span class="user_orders_ruble">
								&#x20bd
							</span>
						</td>						
					</tr>
				<?php endif;
					endforeach; ?>
			</tr>
		</table>

		<table class='user_orders_table hideme' style='display: none;' id='oldOrdersTable'>
			<tr class='user_orders_thead'>
				<td>СОСТОЯНИЕ</td>
				<td>№ ЗАКАЗА</td>
				<td>ВРЕМЯ СОЗДАНИЯ</td>
				<td>СПОСОБ ДОСТАВКИ</td>
				<td>СУММА ЗАКАЗА</td>
			</tr>
			<tr>
				<?php foreach ($userOrders as $order): 
					if ($order['status'] === 'ОТМЕНЁН'):?>
					<tr class='user_orders_tbody'>
						<td><?=$order['status']?></td>
						<td>
							<a href="/order/<?=$order['id']?>" class="user_orders_order_id">
								<?=$order['id']?>							
							</a>
						</td>
						<td><?=$order['data_created']?></td>
						<td><?=$order['delivery']?></td>
						<td>
							<span class="user_orders_order_price">
								<?=$order['real_price']?>								
							</span>
							<span class="user_orders_ruble">
								&#x20bd
							</span>
						</td>						
					</tr>
				<?php endif;
					endforeach; ?>
			</tr>
		</table>	

	</div>
</div>

