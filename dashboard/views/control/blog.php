<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Dashboard | Panel de administración.</title>
	<?php include('./helpers/styles.php'); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('./helpers/navbar.php'); ?>

	<div class="blog-content">
		
	</div>
	<?php include('./helpers/scripts.php'); ?>
</body>
</html>