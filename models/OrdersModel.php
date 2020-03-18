<?php 


/**
* Модель для обращения к таблице заказов
*/

/**
* Возвращает все заказы нужного пользователя, а также выясняет ID авторизованного пользователя
*/
function getCurrentUserOrders() {
	$userId = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
	if ($userId) {
		$rs = getOrdersByUserId($userId);
		return $rs;
	}
}

/**
* Возвращает заказы пользователя с id = $id
*
* @param int $id -  идентификатор пользователя
* @return array $result - массив со всеми заказами
*/
function getOrdersByUserId($id) {
	$pdo = $GLOBALS['db'];

	$sql = 'SELECT * FROM orders WHERE user_id = :id';
	$query = $pdo->prepare($sql);
	$query->execute(array('id'=>$id));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	for ($i = 0; $i < count($result); $i++) {
		$order = &$result[$i];
		$purchase = getPurchaseForOrder($order['id']);
		if ($purchase) {
			$order['purchase'] = $purchase;
			$realPrice = 0;
			for ($x = 0; $x < count($order['purchase']); $x++) {
				$purchase = $order['purchase'][$x];
				$realPrice += $purchase['amount']*$purchase['price'];
			}
			$order['real_price'] = $realPrice;
		}

	}

	return $result;
}

/**
* Возвращает покупки пользователя 
*
* @param int $id -  идентификатор заказа
* @return array $result - массив со всеми заказами
*/
function getPurchaseForOrder($id) {
	$pdo = $GLOBALS['db'];

	$sql = 'SELECT `purchases`.*, `products`.name FROM purchases JOIN products ON `purchases`.product_id = `products`.id  WHERE `purchases`.order_id = :id';
	$query = $pdo->prepare($sql);
	$query->execute(array('id'=>$id));
	$result = $query->fetchAll(PDO::FETCH_ASSOC);

	return $result;
}





?>