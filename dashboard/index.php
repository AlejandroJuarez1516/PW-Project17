<?php 
	require_once './init.php';
	require_once './classes/database.php';

	$connection = database::connect();
	$sql = 'SELECT COUNT(id) FROM users'; $params = null;
	$count = database::getRow($sql, $params);
	if ($count[0] > 0) {
		require_once "views/login.php";
	} else {
		require_once "./views/signup.php";
	}
?>