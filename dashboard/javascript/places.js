function httpRequest () {
	return new XMLHttpRequest() || new ActiveXObject("MSXML2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP") || null
}

const btnPlacesFile = document.getElementById("btn-places-file") || null
const btnPlacesClear = document.getElementById("btn-places-clear") || null
const btnPlacesUpdate = document.getElementById("btn-places-update") || null
const btnPlacesDelete = document.getElementById("btn-places-delete") || null
const btnPlacesSave = document.getElementById("btn-places-send") || null

document.addEventListener('DOMContentLoaded', function () {
	if (btnPlacesFile != null) {
		loadPlacesData()
		filePlacesListener()
	}	

	if (btnPlacesSave != null) {
		sendPlacesListener()
	}

	if (btnPlacesClear != null) {
		clearPlacesListener()
	}

	if (btnPlacesDelete != null) {
		deletePlacesListener()
	}

	if (btnPlacesUpdate != null) {
		updatePlacesListener()
	}
})

function sendPlacesListener() {
	btnPlacesSave.addEventListener('click', function (event) {
		event.preventDefault()

		var fields = {
		 	place: document.getElementById("place").value,
		 	description: document.getElementById("description").value,
		 	image: result
		}

		const xhr = new httpRequest()
		xhr.open('POST', '../../api/places/save-place.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-place-body')
						btnPlacesClear.click()
						getPlaces(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function updatePlacesListener () {
	btnPlacesUpdate.addEventListener('click', function (event) {
		event.preventDefault()
	
		if (document.getElementById("id").value.length == 0) {
			alertify.alert("No se ha seleccionado ningun lugar!")
			return false
		} 

		var fields = {
			id: document.getElementById("id").value,
		 	place: document.getElementById("place").value,
		 	description: document.getElementById("description").value,
		 	image: document.getElementById("place-img").src
		}

		const xhr = new httpRequest()
		xhr.open('POST', '../../api/places/update-place.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-place-body')
						btnPlacesClear.click()
						getPlaces(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function deletePlacesListener () {
	btnPlacesDelete.addEventListener('click', function (event) {
		event.preventDefault();

		if (document.getElementById("id").value.length == 0) {
			alertify.alert("No se ha seleccionado ningun lugar!")
			return false
		} 

		var fields = {
			id: document.getElementById("id").value
		}

		const xhr = new httpRequest()
		xhr.open('POST', '../../api/places/delete-place.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-place-body')
						btnPlacesClear.click()
						getPlaces(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function filePlacesListener () {
	btnPlacesFile.addEventListener('click', function (event) {
		event.preventDefault()
		document.getElementById("file").click()
	})
}

function loadPlacesData () {
	const table = document.querySelector('.table-place-body')
	getPlaces(table)
}

function clearPlacesListener() {
	btnPlacesClear.addEventListener('click', function (event) {
		event.preventDefault()
		document.getElementById("id").value = ""
		document.getElementById("place").value = ""
		document.getElementById("description").value = ""
		document.getElementById('place-img').src = "http://localhost/PW-Project17/assets/images/noImage.jpg"
	})
}

function getPlaces (dataTable) {
	const xhr = new httpRequest()
	xhr.open('GET', '../../api/places/get-places.php')
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status) {
			const response = JSON.parse(xhr.responseText)
			if (!response[0].error) {
				const node = response.length
				var tr = null, id = null, places = null, description = null, action = null
				
				dataTable.innerHTML = ""
				
				for (var i = 0; i < node; i++) {

					tr = document.createElement("tr")
					id = document.createElement("td")
					places = document.createElement("td")
					description = document.createElement("td")
					action = document.createElement("td")

					var button = document.createElement("button")
					button.appendChild(document.createTextNode("Ver"))

					button.setAttribute('class', 'btn btn-outline-dark')
					button.setAttribute('placeId', response[i].id)
					button.setAttribute('places', response[i].place)
					button.setAttribute('description', response[i].description)
					button.setAttribute('image', response[i].image)

					button.onclick = function (event) {
						const element = event.target
						editplace(element)
					}

					id.appendChild(document.createTextNode(response[i].id))
					places.appendChild(document.createTextNode(response[i].place))
					description.appendChild(document.createTextNode(response[i].description))
					action.appendChild(button)

					tr.appendChild(id)
					tr.appendChild(places)
					tr.appendChild(description)
					tr.appendChild(action)

					dataTable.appendChild(tr)
				}
			}
		}
	}
	xhr.send(null)
}

function editplace (element) {
	var object = {
		id: element.getAttribute('placeId'),
		place: element.getAttribute('places'),
		description: element.getAttribute('description'),
		image: element.getAttribute('image')
	}

	document.getElementById("id").value = object.id
	document.getElementById('place').value = object.place
	document.getElementById("description").value = object.description
	document.getElementById('place-img').src = "data:image/jpg;base64" + object.image
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
    jQuery('.place-img').attr('src', event.target.result) //se le establece la imagen al atributo source "src" al la etiqueta img
    var str = event.target.result // obtiene el result de la funcion
    result = str.substring(22) //se obtiene el BLOB puro del result de arriba
  };
  Lector.readAsDataURL(oFileInput.files[0]) // se lee el url de la imagen 
})