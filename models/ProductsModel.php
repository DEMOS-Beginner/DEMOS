<?php 


/**
* Модель для обращения к таблице продуктов
*/



/**
* Возвращает последние продукты в нужном количестве
* @param int $count - количество продуктов
*/
function getLastProducts($count) {
	$pdo = $GLOBALS['db']; //преодоление ограниченной области видимости функции

	$sql = "SELECT name, price, image, id FROM products LIMIT $count";
	$query = $pdo->prepare($sql);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}

/**
* Возвращает продукт с указанным id
* @param int $id - id продукта
*/
function getProductById($id) {
	$pdo = $GLOBALS['db']; //преодоление ограниченной области видимости функции

	$sql = "SELECT * FROM products WHERE id = :id";
	$query = $pdo->prepare($sql);
	$query->execute(array('id'=>$id));
	$result = $query->fetch(PDO::FETCH_ASSOC);

	return $result;
}

/**
*	Возвращает массив продуктов по массиву id
*	@param int $arrayIds - массив id
*/
function getProductFromCartArray($arrayIds) {
	$pdo = $GLOBALS['db']; //преодоление ограниченной области видимости функции
	$result = array();

	foreach($arrayIds as $id) {
		$result[] = getProductById($id);
	}
	
	return $result;
}


?>