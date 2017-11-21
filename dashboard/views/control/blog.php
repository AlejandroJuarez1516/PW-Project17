<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	} 

	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];
	$url = '2017/PW-Project17/assets/images/';

	$noImage = $serverProtocol . '://' . $serverName . '/'. $url .'noImage.jpg';
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
		<div class="text-center">
			<h3 class="title">Administración de Blog.</h3>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form>
					  <div class="form-group">
					    <label for="title">Titulo del blog:</label>
					    <input type="text" class="form-control" id="title">
					  </div>
					  <div class="form-group text-center">
						<img src="<?php echo $noImage; ?>" class="img-responsive blog-img" alt="blogImage" />
					  	<button class="btn btn-outline-danger w-100">Cargar imagen.</button>
					  </div>
					  <div class="form-group">
					    <label for="content">Contenido</label>
					    <textarea class="form-control" id="content" rows="7"></textarea>
					  </div>
					</form>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
	</div>
	<?php include('./helpers/scripts.php'); ?>
</body>
</html>