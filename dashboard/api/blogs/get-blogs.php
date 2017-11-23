<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	require_once '../../classes/database.php';

	$output = array();
	$sql = "SELECT b.id, title, content, blog_date, image, CONCAT(name, ' ', lastname) AS fullname, email FROM blogs AS b, users AS u WHERE b.user_id = u.id ORDER BY blog_date DESC";
	$params = null;

	$blogs = Database::getData($sql, $params);
	if (count($blogs) > 0) {
		foreach ($blogs as $key) {
			$output[] = array('id' => $key['id'],
							  'title' => $key['title'],
							  'blogContent' => $key['content'],
							  'image' => $key['image'],
							  'postDate' => $key['blog_date'],
							  'user' => $key['fullname'],
							  'userEmail' => $key['email']
							  );
		}
	} else {
		$output[] = array("error" => true,
						  "message" => "No hay registros en la base de datos!");
	}

	echo json_encode($output);
?>