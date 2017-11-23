var botonIngresar = false;
var table;
$(document).ready(function (){
  var listar = function(){
  table = $("#tablaProducto").DataTable({
    "ajax":{
        "method": "POST",
        "url": "../../api/users/show.php"
    },
     "columns":[
      {"data":"name"},
      {"data":"last_name"},
      {"data":"email"},
      {"data":"user_type"},
      {"defaultContent":"<button type='button' class='editar inlineB'><i class='fa fa-pencil' aria-hidden='true'></i></button><button type='button' class='borrar inlineB'><i class='fa fa-trash' aria-hidden='true'></i></button>"}
    ]
  });

 }

  listar();
  //var tabla = setInterval(validarCampos,100);
  var obtenerData = function(){
  $("tbody").on("click", "button.editar", function(){
    var data = table.row( $(this).parents("tr") ).data();
    var name = $("#name1").val( data.name ), last_name = $("#last_name1").val( data.last_name ), email = $("#email1").val( data.email ), password = $("#password1").val( data.password ), userType = $("#userType1").val( data.user_type ), id = $("#id1").val( data.id );
  });
  $("tbody").on("click", "button.borrar", function(){
    var data = table.row( $(this).parents("tr") ).data();
    var name = $("#valorId").val( data.id );
    $("#valorId").val(data.id);
  });

}

obtenerData("#tablaProducto", table);
$("tbody").on("click", "button.borrar", function(){
  if(confirm("¿Desea eliminar?")){
  event.preventDefault()
  var fields = {
    id: document.getElementById("valorId").value
  }
  var xhr = new loadHttpRequest()
  xhr.open('POST', '../../api/users/delete.php')
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  xhr.onreadystatechange = function () {
    if(xhr.readyState == 4 && xhr.status == 200) {
      const response = JSON.parse(xhr.responseText)
      if (response.rows > 0) {
        alertify.alert("¡Se ha borrado de la base de datos!", function (event) {
          event.preventDefault()          
          //window.location.reload()
          table.destroy();
         var listar = function(){
              table = $("#tablaProducto").DataTable({
                "ajax":{
                    "method": "POST",
                    "url": "../../api/users/show.php"
                },
                 "columns":[
                    {"data":"name"},
                    {"data":"last_name"},
                    {"data":"email"},
                    {"data":"user_type"},
                    {"defaultContent":"<button type='button' class='editar inlineB'><i class='fa fa-pencil' aria-hidden='true'></i></button><button type='button' class='borrar inlineB'><i class='fa fa-trash' aria-hidden='true'></i></button>"}
                  ]
              });
}
         listar();
        })
      } else {
        alertify.alert("Ocurrió un error, puedes volver a intentar la operación.");
      }
    }
  }
  xhr.send(JSON.stringify(fields))
  }
});



});



$(".botonIngresar").click(function(){
  var boton = $(".botonIngresar");
  var contenedor = $("#contentIng");
  if(!botonIngresar){
    boton.html("ocultar");
    contenedor.removeAttr("style");
    $("#update").attr("class","hide");
    botonIngresar = true;
  }else{
     boton.html("Ingresar");
     contenedor.attr("style","display: none;");
     $("#update").attr("class","btn btn-primary botonModificar");
     botonIngresar = false;
  }
});

$(".botonModificar").click(function(){
  var boton2 = $(".botonModificar");
  var contenedor2 = $("#contentIng2");
  if(!botonIngresar){
    boton2.html("ocultar");
    contenedor2.removeAttr("style");
    $("#insert").attr("class","hide");
    botonIngresar = true;
  }else{
     boton2.html("Actualizar");
     contenedor2.attr("style","display: none;");
     $("#insert").attr("class","btn btn-primary botonIngresar");
     botonIngresar = false;
  }
});


function loadHttpRequest () {
  var request = false
  if (window.XMLHttpRequest) {
    request = new XMLHttpRequest()
  } else if (window.ActiveXObject) {
    try {
      request = new ActiveXObject("MSXML2.XMLHTTP")
    } catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP")
      } catch (e) {}
    }
  } else {
    console.log('No ha sido posible crear una instancia de XMLHttpRequest')
  }
  return request
}


document.getElementById("insertButton").addEventListener('click', function (event) {
  event.preventDefault()
  var fields = {
    name: document.getElementById("name").value,
    lastname: document.getElementById("last_name").value,
    email: document.getElementById("email").value,
    password: document.getElementById("password").value,
    userType: document.getElementById("userType").value
  }
  var xhr = new loadHttpRequest()
  xhr.open('POST', '../../api/users/insert.php')
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  xhr.onreadystatechange = function () {
    if(xhr.readyState == 4 && xhr.status == 200) {
      const response = JSON.parse(xhr.responseText)
      if (response.rows > 0) {
        alertify.alert("¡Se ha insertado en la base de datos!", function (event) {
          event.preventDefault()          
          //window.location.reload()
          table.destroy();
          var listar = function(){
            table = $("#tablaProducto").DataTable({
              "ajax":{
                  "method": "POST",
                  "url": "../../api/users/show.php"
              },
               "columns":[
                {"data":"name"},
                {"data":"last_name"},
                {"data":"email"},
                {"data":"user_type"},
                {"defaultContent":"<button type='button' class='editar inlineB'><i class='fa fa-pencil' aria-hidden='true'></i></button><button type='button' class='borrar inlineB'><i class='fa fa-trash' aria-hidden='true'></i></button>"}
              ]
            });
          }
          listar();
        })
      } else {
        alertify.alert("Ocurrió un error, puedes volver a intentar la operación.");
      }
    }
  }
  xhr.send(JSON.stringify(fields))
})


document.getElementById("updateButton").addEventListener('click', function (event) {
  event.preventDefault()
  var fields = {
    id: document.getElementById("id1").value,
    name: document.getElementById("name1").value,
    lastname: document.getElementById("last_name1").value,
    email: document.getElementById("email1").value,
    password: document.getElementById("password1").value,
    userType: document.getElementById("userType1").value
  }
  var xhr = new loadHttpRequest()
  xhr.open('POST', '../../api/users/update.php')
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  xhr.onreadystatechange = function () {
    if(xhr.readyState == 4 && xhr.status == 200) {
      const response = JSON.parse(xhr.responseText)
      if (response.rows > 0) {
        alertify.alert("¡Se ha modificado en la base de datos!", function (event) {
          event.preventDefault()          
          //window.location.reload()
          table.destroy();
         var listar = function(){
              table = $("#tablaProducto").DataTable({
                "ajax":{
                    "method": "POST",
                    "url": "../../api/users/show.php"
                },
                 "columns":[
                    {"data":"name"},
                    {"data":"last_name"},
                    {"data":"email"},
                    {"data":"user_type"},
                    {"defaultContent":"<button type='button' class='editar inlineB'><i class='fa fa-pencil' aria-hidden='true'></i></button><button type='button' class='borrar inlineB'><i class='fa fa-trash' aria-hidden='true'></i></button>"}
                  ]
              });
}
         listar();
        })
      } else {
        alertify.alert("Ocurrió un error, puedes volver a intentar la operación.");
      }
    }
  }
  xhr.send(JSON.stringify(fields))
})


$("tbody").on("click", "button.borrar", function(){
  if(confirm("¿Desea eliminar?")){
  event.preventDefault()
  var fields = {
    id: document.getElementById("valorId").value
  }
  var xhr = new loadHttpRequest()
  xhr.open('POST', '../../api/users/delete.php')
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  xhr.onreadystatechange = function () {
    if(xhr.readyState == 4 && xhr.status == 200) {
      const response = JSON.parse(xhr.responseText)
      if (response.rows > 0) {
        alertify.alert("¡Se ha borrado de la base de datos!", function (event) {
          event.preventDefault()          
          //window.location.reload()
          table.destroy();
         var listar = function(){
              table = $("#tablaProducto").DataTable({
                "ajax":{
                    "method": "POST",
                    "url": "../../api/users/show.php"
                },
                 "columns":[
                    {"data":"name"},
                    {"data":"last_name"},
                    {"data":"email"},
                    {"data":"user_type"},
                    {"defaultContent":"<button type='button' class='editar inlineB'><i class='fa fa-pencil' aria-hidden='true'></i></button><button type='button' class='borrar inlineB'><i class='fa fa-trash' aria-hidden='true'></i></button>"}
                  ]
              });
}
         listar();
        })
      } else {
        alertify.alert("Ocurrió un error, puedes volver a intentar la operación.");
      }
    }
  }
  xhr.send(JSON.stringify(fields))
  }
});
