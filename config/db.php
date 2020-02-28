<?php 
/*
*
* Инициализация подключения к базе данных
*
*/

	$dblocation = '127.0.0.1';
	$dbname = 'true_cm_db';
	$dbuser = 'root';
	$dbpassword = '';
	$hostName = 'myblog.local';

	try {
		$db = new PDO("mysql:host=$hostName;dbname=$dbname", $dbuser, $dbpassword, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	} catch (PDOException $e) {
		echo "Невозможно установить соединение с базой данных";
	}


?>