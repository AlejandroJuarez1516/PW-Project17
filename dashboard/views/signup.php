<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/css/styles.css">
  	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		<div class="sign-up">
			<div class="container">
				<form>
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 registration-form">
							<h3 class="text-center form-title">Bienvenido</h3>
							<h4 class="text-justify form-text">Se ha detectado que es la primera vez que el sistema es ejecutado, para poder empezar debes de llenar la siguiente información que nos permitirá crear el primer usuario en el sistema.</h4>
							<div class="form-container">
								<div class="form-group">
								  <div class="form-group"> 
								    <label for="name">Nombre:</label>
								    <input type="text" class="form-control" autocomplete="off" id="name" name="name" required />
								  </div>
								</div>
								<div class="form-group">
									<div class="form-group">
									   <label for="lastname">Apellido:</label>
									   <input type="text" class="form-control" autocomplete="off" id="lastname" name="lastname" value="" required />
									</div>
								</div>
								<div class="form-group">
									<div class="form-group">
									   <label for="lastname">Correo electrónico:</label>
									   <input type="email" autocomplete="false" autocomplete="off" class="form-control" id="email" name="email" required />
									</div>
								</div>
								<div class="form-group">
									<div class="form-group">
									   <label for="lastname">Contraseña:</label>
									   <input type="password" class="form-control" id="password" name="password" required />
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn-outline-secondary" id="btn-send">Enviar</button>
								</div>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<script src="./javascript/init.js"></script>
</body>
</html>