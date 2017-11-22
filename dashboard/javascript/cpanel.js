function httpRequest () {
	return new XMLHttpRequest() || new ActiveXObject("MSXML2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP") || null
}

const logOut = document.getElementById("logOut") || null

document.addEventListener('DOMContentLoaded', function () {
	if (logOut != null) {
		logOutListener()
	}
})

function logOutListener() {
	logOut.addEventListener('click', function (event) {
		event.preventDefault()
		
		const xhr = new httpRequest()
		xhr.open('GET', '../../api/users/logOut.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				alertify.alert(response[0].message, function (event) {
					event.preventDefault()
					window.location.href = response[0].redirect
				})
			}
		}
		xhr.send(null)
	})
}