<?php 	
	require_once '../Classes/database.php';
	require_once '../Classes/functions.php';
	$count = database::getRow("SELECT id FROM users WHERE email = :email AND password = :password", array(":email" => $_POST['email'], ":password" => Encript::funEncrypt($_POST['password'])));
	if($count > 0){
		echo "<p>El usuario se encuentra en la base de datos</p>";
	}else{
	    echo "No se encuentra";
	}
?>