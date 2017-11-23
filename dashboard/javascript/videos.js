function httpRequest () {
	return new XMLHttpRequest() || new ActiveXObject("MSXML2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP") || null
}

const btnUpdateVideos = document.getElementById("btn-update") || null
const btnDeleteVideos = document.getElementById("btn-delete") || null
const btnSaveVideos = document.getElementById("btn-send") || null
const txtLink = document.getElementById("link") || null

document.addEventListener("DOMContentLoaded", function () {

	if (btnSaveVideos != null) {
		sendListener()
		linkListener()
	}

	if (btnClear != null) {
		clearListener()
	}

	if (btnUpdateVideos != null) {
		updateListener()
	}

	if (btnDeleteVideos != null) {
		deleteListener()
	}
})

function sendListener() {
	btnSaveVideos.addEventListener('click', function (event) {
		event.preventDefault()
		var fields = {
		 	name: document.getElementById("title").value,
		 	link: document.getElementById("link").value,
		 	description: document.getElementById("description").value
		}
		
		const xhr = new httpRequest()
		xhr.open('POST', '../../api/videos/save-video.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						//const table = document.querySelector('.table-body')
						//getBlogs(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function linkListener() {
	txtLink.addEventListener('change', function (event) {
		var link = event.target.value
		document.querySelector('.video').src = link
	})
}