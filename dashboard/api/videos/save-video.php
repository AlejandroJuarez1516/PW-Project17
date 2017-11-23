<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$json = file_get_contents('php://input');
	$jsonObject = json_decode($json);
	$output = array();

	$sql = "SELECT COUNT(*) AS count FROM videos WHERE title = ?";
	$params = array($jsonObject->title);
	$videos = Database::getRow($sql, $params);
	
	if ($videos['count'] == 0) {
		$sql = "INSERT INTO videos (name, link, description) VALUES (?,?,?)";
		$params = array($jsonObject->name, $jsonObject->link, $jsonObject->description);
		Database::executeRow($sql, $params);
		$output[] = array('success' => true,
						  'message' => '¡Se ha ingresado un video!');
	} else {
		$output[] = array('error' => true,
						  'message' => '¡Ya existe un video con ese titulo!');
	}

	echo json_encode($output);

?>

