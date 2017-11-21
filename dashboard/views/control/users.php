<?php 
  session_start();
  if(!isset($_SESSION['id']) || !isset($_SESSION['fullname']) || !isset($_SESSION['usertype']) || !isset($_SESSION['user'])){ 
    echo '<script>window.location.href = "../../"</script>';
  } 
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <title>Usuarios</title>
  <?php include('./helpers/styles.php'); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Título</title>
  <meta name="description" content="Un Punto de venta.">

  </head>
  <body>
    <?php include('./helpers/navbar.php'); ?>
    <h1 style="color:white;font-weight:bold;font-family: fantasy;font-size:50px">Usuarios Registrados: </h1>
    <div class="row"> 
      <div class="col-md-6">
          <div class="contenedorBotones">
            <button class="btn btn-primary botonIngresar" style="margin-left:250px;">Ingresar</button>
                <div id="contentIng" style="display: none">
                  <form>
                          <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input class="form-control" type="text" id="name" required>
                          </div>
                           <div class="form-group">
                            <label for="Apellido">Apellido</label>
                            <input class="form-control" type="text" id="last_name" required>
                          </div>
                          <div class="form-group">
                            <label for="correo">Correo</label>
                            <input class="form-control" type="text" id="email" required>
                          </div>
                          <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input class="form-control" type="password" id="password" required>
                          </div>
                          <div class="form-group">
                            <label for="tipo">Tipo de usuario</label>
                            <input class="form-control" type="text" id="userType" required>
                          </div>
                          <button class="btn" id="insertButton">Ingresar</button>               
                  </form>
          </div>
          <button class="btn btn-primary botonModificar" style="margin-left:250px;">Modificar</button>
          <div id="contentIng2" style="display: none;">
                  <form>
                          <div class="form-group"  style="display:none">                            
                              <input class="form-control" type="text" id="id1" required>
                          </div>
                          <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input class="form-control" type="text" id="name1" required>
                          </div>
                           <div class="form-group">
                            <label for="Apellido">Apellido</label>
                            <input class="form-control" type="text" id="last_name1" required>
                          </div>
                          <div class="form-group">
                            <label for="correo">Correo</label>
                            <input class="form-control" type="text" id="email1" required>
                          </div>
                          <div class="form-group">
                            <label for="contraseña">Contraseña</label>
                            <input class="form-control" type="password" id="password1" required>
                          </div>
                          <div class="form-group">
                            <label for="tipo">Tipo de usuario</label>
                            <input class="form-control" type="text" id="userType1" required>
                          </div>
                          <button class="btn" id="updateButton">Modificar</button>
                  </form>
          </div>
          <input type="text" id="valorId">
      </div>
    </div>
    <div class="col-md-6">
              <form id="dataTable">
                <table class="table table-bordered table-hover center"  id="tablaProducto">                
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Correo</th>
                      <th>valor</th>
                      <th></th>
                    </tr>
                  </thead>
                </table>
                 </form>         
     </div>   
    <?php include('./helpers/styles.php'); ?>
    <?php include('./helpers/scripts.php'); ?>
  </body>
</html>
