<?php 
	require_once '../Classes/database.php';
	require_once '../Classes/functions.php';
	database::connect();
	if(isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])){
		echo "Entro";
		database::executeRow("INSERT INTO users VALUES (:id, :name, :lastname, :email, :password, :value)", array(":id" => '', ":name" => $_POST['name'], ":lastname" => $_POST['lastname'], ":email" => $_POST['email'], ":password" => Encript::funEncrypt($_POST['password']), ":value" => 3));
		header("Location: login.php");
	}else{
		//header("Refresh: 1; url = signup.php");
	}
?>