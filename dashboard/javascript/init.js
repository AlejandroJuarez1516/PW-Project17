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
			
		}
	}
	xhr.send(JSON.stringify(fields))
})