function httpRequest () {
	return new XMLHttpRequest() || new ActiveXObject("MSXML2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP") || null
}

const btnSend = document.getElementById("btn-send") || null
const btnLogin = document.getElementById("btn-login") || null


document.addEventListener("DOMContentLoaded", function () {
	if (btnSend != null) {
		signUpListener()
	}

	if (btnLogin != null) {
		loginListener ()
	}
})



function signUpListener () {
	btnSend.addEventListener('click', function (event) {
		event.preventDefault()
		var fields = {
			name: document.getElementById("name").value,
			lastname: document.getElementById("lastname").value,
			email: document.getElementById("email").value,
			password: btoa(document.getElementById("password").value)
		}

		const xhr = new httpRequest()
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
					alertify.alert("Ocurrió un error, puedes volver a intentar la operación.")
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function loginListener () {
	btnLogin.addEventListener("click", function (event) {
		event.preventDefault()
		var fields = {
			email: document.getElementById("email").value,
			password: btoa(document.getElementById("password").value)
		}

		const xhr = new httpRequest()
		xhr.open('POST', 'api/users/login.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert("Bienvenido: " + response[0].fullname + "!", function (event) {
						event.preventDefault()
						window.location.href = response[0].redirect
					})
				} else {
					alertify.alert(response.message);
					document.getElementById("email").value = ""
					document.getElementById("password").value = ""
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}