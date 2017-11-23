<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$output = array();
	$sql = "SELECT id, place, description, image FROM places";
	$params = null;

	$blogs = Database::getData($sql, $params);
	if (count($blogs) > 0) {
		foreach ($blogs as $key) {
			$output[] = array('id' => $key['id'],
							  'place' => $key['place'],
							  'description' => $key['description'],
							  'image' => $key['image']
							  );
		}
	} else {
		$output[] = array("error" => true,
						  "message" => "No hay registros en la base de datos!");
	}

	echo json_encode($output);
?>