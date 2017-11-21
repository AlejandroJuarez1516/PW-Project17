<?php 
	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);

	$sql = "INSERT INTO blogs (id, title, id_usuario, blog_date, user_type) VALUES (?,?,?,?,?)";
	$params = array($jsonObject->name, $jsonObject->lastname, $jsonObject->email, md5($jsonObject->password), 1);
?>