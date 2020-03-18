<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Кубик Рубика - купить с оплатой при получении!</title>
	<link rel="stylesheet" href="/static/default/css/main.css">
	<link rel="stylesheet" href="/static/default/css/header.css">
	<link rel="stylesheet" href="/static/default/css/index_styles.css">
	<link rel="stylesheet" href="/static/default/css/actions_panel.css">
	<link rel="stylesheet" href="/static/default/css/product_page.css">
	<link rel="stylesheet" href="/static/default/css/cart.css">
	<link rel="stylesheet" href="/static/default/css/modal_logreg.css">
	<link rel="stylesheet" href="/static/default/css/user_menu.css">
	<link rel="stylesheet" href="/static/default/css/my_orders.css">
	<script src='/js/main.js'></script>
	<script src='/js/jquery.js'></script>
</head>
<body>
	<div class="header_border_bottom"> <!--Аналог тега HR-->
		<div class="container">

			<header class='header_first'>
				<nav class='header_first_nav'>
					<div class="header_city">
						<p class='header_city_text'> Ваш город: </p>
						<p class='header_city_name'> Братск </p>
					</div>

					<ul class='header_hover_links'>
						<li><a href="#"> Доставка </a></li>
						<li><a href="#"> Оплата </a></li>
						<li><a href="#"> Отзывы </a></li>
						<li><a href="#"> Контакты </a></li>
					</ul>

					<ul>
						<li><a href="#" class='header_blog_link'> Блог </a></li>
						<li><a href="#" class="header_shop_link"> Что с моим заказом? </a></li>
						<li><a href="#" class='header_purchase_link'> Наши магазины </a></li>
					</ul>
				</nav>
			</header>	

		</div>	
	</div>

	<div class="container">
		<section class="header_second">
			<nav class="header_second_nav">
				<div class="header_logo">
					<a href="/"><img src="/images/site/header_logo.png" alt=""></a>
				</div>

				<ul>
					<li> <a href="#"> НОВИНКИ ФЕВРАЛЯ </a> </li>
					<li> <a href="#"> ЛИКВИДАЦИЯ СКЛАДА </a> </li>
					<li> <a href="#"> ХИТЫ ПРОДАЖ </a> </li>
				</ul>

				<div class="header_call_block">
					<p class='header_call'> Заказать звонок </p>
					<p class="header_number"> 8 (499) 430-19-13 </p>
				</div>
			</nav>
		</section>
	</div>

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

	<div class="log_modal">
		<div class="log_modal_content">
			<span class="log_close" id='logClose'>&times;</span>
			<h2 class='log_heading'>Вход на сайт</h2>
			<div class="log_error hideme"></div>
			<input type="text" id="userEmail" class="log_input" placeholder="Email" name='userEmail'>
			<span class='log_or'>или</span>
			<input type="text" id="userNumber" class="log_input" placeholder="Телефон" name='userName'>
			<input type="password" id="userPassword" class="log_input" placeholder="Пароль" name='userPassword'>
			<a href="#" class='log_register_link' onclick='showReg();'>Не зарегистрированы?</a>
			<button class='log_button' onclick='login();'>ВОЙТИ</button>
		</div>
	</div>

	<div class="reg_modal">
		<div class="reg_modal_content">
			<span class="reg_close" id='regClose'>&times;</span>
			<h2 class='reg_heading'>Регистрация</h2>
			<div class="reg_error hideme"></div>
			<input type="text" id="userEmail" class="reg_input" placeholder="Email" name='userEmail'>
			<input type="text" id="userName" class="reg_input" placeholder="Имя и фамилия" name='userName'>
			<input type="password" id="userPassword" class="reg_input" placeholder="Пароль" name='userPassword'>
			<button class='reg_button' onclick='register();'>Зарегистрироваться</button>
		</div>
	</div>




