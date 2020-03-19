<section class="ma_section">
	<div class="container ma_block">
		<div class="ma_panel">
			<p>
				Каталог товаров
			</p>

			<div class="ma_search_input_block">
				<input type="text" id='search' name='search' placeholder="Что будем искать?">
			</div>

			<div class="ma_user_block">					
				<div class="ma_user_name">
					<?php if (!isset($_SESSION['user'])): ?>
						<a href="#" class="ma_login_link" onclick='showLogreg(); return false;' id='userCabinet'>
							Войти на сайт
						</a>
					<?php else: ?>
						<a href="#" class="ma_login_link hideme" onclick='showUserDropDown(); return false;' id='userCabinet'>
							<?= $_SESSION['user']['email'] ?>
						</a>					
					<?php endif; ?>
				</div>

				<div class="ma_user_menu">
					<nav>
						<ul>
							<li class='ma_um_hello'>Здравствуйте</li>
							<li class='ma_li'><a href="/user" id='toUserPage'><?= $_SESSION['user']['email'] ?></a></li>
							<li class='ma_li'><a href="/user">МОИ ЗАКАЗЫ</a></li>
							<li class='ma_li'><a href="#">ЛИЧНЫЕ ДАННЫЕ</a></li>
							<li class='ma_li'><a href="#">МОЯ КОЛЛЕКЦИЯ</a></li>
							<li class='ma_um_logout'>
								<a onclick='logout();' href='/user/logout'>Выйти</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="ma_cart_panel">
			<div class="ma_cart_block">
				<a href = '/cart' class="ma_cart_link">
					Корзина
				</a>
				<span id='price_of_cart'>
					0 &#x20bd
				</span>
			</div>
		</div>
	</div>
</section>