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


document.getElementById("btn-send").addEventListener('click', function (event) {
	event.preventDefault()
	var fields = {
		name: document.getElementById("name").value,
		lastname: document.getElementById("lastname").value,
		email: document.getElementById("email").value,
		password: document.getElementById("password").value
	}

	var xhr = new loadHttpRequest()
	xhr.open('POST', 'api/users/initial-setup.php')
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
				alertify.alert("Ocurrió un error, puedes volver a intentar la operación.");
			}
		}
	}
	xhr.send(JSON.stringify(fields))
})