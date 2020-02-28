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

	<section class="main_actions_section">
		<div class="container main_actions_div">
			<div class="actions_panel">
				<p>
					Каталог товаров
				</p>
				<div class="search_input_div">
					<input type="text" id='search' name='search' placeholder="Что будем искать?">
				</div>
				<a href="#" class="login_link">
					Войти на сайт
				</a>
			</div>

			<div class="cart_panel">
				<div class="cart_div">
					<a href = '/cart' class="cart_link">
						Корзина
					</a>
					<span id='price_of_cart'>
						0 &#x20bd
					</span>
				</div>
			</div>
		</div>
	</section>


