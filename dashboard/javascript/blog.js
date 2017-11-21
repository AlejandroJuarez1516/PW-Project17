function httpRequest () {
	return new XMLHttpRequest() || new ActiveXObject("MSXML2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP") || null
}

const btnFile = document.getElementById("btn-file") || null
const btnSend = document.getElementById("btn-send") || null

document.addEventListener("DOMContentLoaded", function () {
	if (btnFile != null) {
		fileListener()
	}

	if (btnSend != null) {
		sendListener()
	}
})

function sendListener() {
	btnSend.addEventListener('click', function (event) {
		event.preventDefault()
		var fields = {
		 	title: document.getElementById("title").value,
		 	content: document.getElementById("content").value,
		 	image: result
		}

		const xhr = new httpRequest()
		xhr.open('POST', 'api/blog/save-blog.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response.rows > 0) {
					alertify.alert("¡Se ha creado el usuario en la base de datos!", function (event) {
						event.preventDefault()
						window.location.reload()
					})
				} else {
					alertify.alert("Ocurrió un error, puedes volver a intentar la operación.")
				}
			}
		}
		xhr.send(JSON.stringify(fields))

	})
}

function fileListener () {
	btnFile.addEventListener('click', function (event) {
		event.preventDefault()
		document.getElementById("file").click()
	})
}

var result
jQuery('#file').on('change', function(e) { //se ejecuta luego de que el selector ID "uploadFile" tenga un valor
  var Lector, // variable que ejecutara la lectura del archivo
      oFileInput = this // variable que lleva el valor del selecto ID "uploadFile"
 
  if (oFileInput.files.length === 0) { //condicion que comprueba que esta variable lleve una imagen
    return
  };
 
  Lector = new FileReader() // se instancia el metodo de lectura File reader en la variable Lector
  Lector.onload = function(event) { // al cargar el archivo
    jQuery('.blog-img').attr('src', event.target.result) //se le establece la imagen al atributo source "src" al la etiqueta img
    var str = event.target.result // obtiene el result de la funcion
    result = str.substring(22) //se obtiene el BLOB puro del result de arriba
  };
  Lector.readAsDataURL(oFileInput.files[0]) // se lee el url de la imagen 
})