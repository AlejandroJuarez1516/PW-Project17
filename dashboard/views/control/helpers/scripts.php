<?php 
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];

	
	$url = 'PW-Project17/dashboard/javascript/';
	$users = $serverProtocol . '://' . $serverName . '/'. $url . 'users.js';
	$dataTable = $serverProtocol . '://' . $serverName . '/'. $url . 'jquery.dataTables.min.js';
	$dataTabJs = $serverProtocol . '://' . $serverName . '/'. $url . 'dataTables.bootstrap.js';
	$dashboard = $serverProtocol . '://' . $serverName . '/'. $url .'dashboard.js';
	$blog = $serverProtocol . '://' . $serverName . '/'. $url .'blog.js';
?>

<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" ></script>
<script src="<?php echo $dashboard; ?>"></script>
<script type="text/javascript" src="<?php echo $users; ?>"></script>
<script type="text/javascript" src="<?php echo $dataTable; ?>"></script>
<script type="text/javascript" src="<?php echo $dataTabJs; ?>"></script>
<script src="<?php echo $blog; ?>"></script>

