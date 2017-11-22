<?php 
	session_start();
	if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
		echo '<script>window.location.href = "../../"</script>';
	} 

	$serverProtocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$serverName = $_SERVER['SERVER_NAME'];
	$url = 'PW-Project17/assets/images/';

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
		  <div class="buttons">
		  	<button class="btn btn-outline-secondary" id="btn-send"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
		  	<button class="btn btn-outline-secondary" id="btn-update"><i class="fa fa-refresh" aria-hidden="true"></i> Modificar</button>
		  	<button class="btn btn-outline-secondary" id="btn-delete"><i class="fa fa-remove" aria-hidden="true"></i> Eliminar</button>
		  	<button class="btn btn-outline-secondary" id="btn-clear"><i class="fa fa-eraser" aria-hidden="true"></i> Limpiar</button>
		  </div>	
		  <form>
		  	 <div class="form-group">
			    <label for="title">Titulo del blog:</label>
			    <input type="text" class="form-control" id="title" />
			    <input type="text" id="id" hidden />
			  </div>
			  <div class="form-group">
				  <div class="row">
				  	<div class="col-md-8">
				  		<label for="content">Contenido</label>
				    	<textarea class="form-control" name="content" id="content" rows="7"></textarea>
				  	</div>
				  	<div class="col-md-4">
				  		<div class="form-group text-center">
							<button class="btn btn-outline-secondary btn-file" id="btn-file">
								<i class="fa fa-picture-o" aria-hidden="true"></i> Agregar una imagen.
							</button>
							<img src="<?php echo $noImage; ?>" class="img-responsive blog-img" id="blog-img" alt="blogImage" />
							<input type="file" id="file" hidden />
						</div>
				  	</div>
				  </div>
			  </div>
		  </form>
		  <div class="blogs-table">
		  	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Titulo</th>
			      <th scope="col">Fecha</th>
			    </tr>
			  </thead>
			  <tbody class="table-body"></tbody>
			</table>
		  </div>
		</div>
	</div>
	<?php include('./helpers/scripts.php'); ?>
</body>
</html>
