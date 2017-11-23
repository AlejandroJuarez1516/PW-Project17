<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	$sql = "SELECT COUNT(*) AS count FROM blogs WHERE title = ?";
	$params = array($jsonObject->title);
	$blogs = Database::getRow($sql, $params);
	
	if ($blogs['count'] == 0) {
		$sql = "INSERT INTO blogs (title, user_id, blog_date, image, content, tags) VALUES (?,?,?,?,?,?)";
		$params = array($jsonObject->title, $_SESSION['id'], date("Y/m/d"), $jsonObject->image, $jsonObject->content, null);
		Database::executeRow($sql, $params);
		$output[] = array('success' => true,
						  'message' => '¡Se ha ingresado un blog!');
	} else {
		$output[] = array('error' => true,
						  'message' => '¡Ya existe un blog con ese titulo!');
	}

	echo json_encode($output);

?>

