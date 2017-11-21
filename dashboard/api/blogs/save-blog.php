<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);

	$sql = "INSERT INTO blogs (id, title, id_usuario, blog_date, image, content, tags) VALUES (?,?,?,?,?,?,?)";
	$params = array($jsonObject->title, $_SESSION['id'], $jsonObject->email, md5($jsonObject->password), 1);
?>