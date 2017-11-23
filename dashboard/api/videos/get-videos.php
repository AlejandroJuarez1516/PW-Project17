<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$output = array();
	$sql = "SELECT id, name, link, description FROM videos ORDER BY id DESC";
	$params = null;

	$blogs = Database::getData($sql, $params);
	if (count($blogs) > 0) {
		foreach ($blogs as $key) {
			$output[] = array('id' => $key['id'],
							  'name' => $key['name'],
							  'link' => $key['link'],
							  'description' => $key['description']);
		}
	} else {
		$output[] = array('error' => true,
						  'message' => 'No hay registros en la base de datos!');
	}

	echo json_encode($output);
?>