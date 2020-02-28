<?php 


/***Index Controller*/
require_once '../models/ProductsModel.php';



/***На главной странице будут выводиться последние товары*/
function indexAction() {
	$lastProducts = getLastProducts(4);

	loadTemplate('header');	
	loadTemplate('index', ['lastProducts' => $lastProducts]);
	loadTemplate('footer');
}

?>