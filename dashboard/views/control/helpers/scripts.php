<?php 
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	}

	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];
	
	$url = 'PW-Project17/dashboard/javascript/';
	$dataTable = $serverProtocol . '://' . $serverName . '/'. $url . 'jquery.dataTables.min.js';
	$dataTabJs = $serverProtocol . '://' . $serverName . '/'. $url . 'dataTables.bootstrap.js';
	$users = $serverProtocol . '://' . $serverName . '/'. $url . 'users.js';
	$ckeditor = $serverProtocol . '://' . $serverName . '/' . 'PW-Project17/assets/js/ckeditor/ckeditor.js';
	$blog = $serverProtocol . '://' . $serverName . '/'. $url .'blogs.js';
	$dashboard = $serverProtocol . '://' . $serverName . '/'. $url .'cpanel.js';
	$videos = $serverProtocol . '://' . $serverName . '/'. $url .'video.js';
	$places = $serverProtocol . '://' . $serverName . '/'. $url .'places.js';
?>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo $dataTable; ?>"></script>
<script type="text/javascript" src="<?php echo $dataTabJs; ?>"></script>
<script type="text/javascript" src="<?php echo $users; ?>"></script>
<script src="<?php echo $ckeditor; ?>"></script>
<script src="<?php echo $dashboard; ?>"></script>
<script src="<?php echo $videos; ?>"></script>
<script src="<?php echo $blog; ?>"></script>
<script src="<?php echo $places; ?>"></script>