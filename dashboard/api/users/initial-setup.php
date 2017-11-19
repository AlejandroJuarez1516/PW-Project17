<?php 
	require_once '../classes/database.php'

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);

	echo $jsonObject->name;
?>