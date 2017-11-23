function httpRequest () {
	return new XMLHttpRequest() || new ActiveXObject("MSXML2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP") || null
}

const btnVideoSave = document.getElementById("btn-video-send") || null
const btnVideoDelete = document.getElementById("btn-video-delete") || null
const btnVideoUpdate = document.getElementById("btn-video-update") || null
const btnVideoClear = document.getElementById("btn-video-clear") || null
const txtLink = document.getElementById("link") || null

document.addEventListener('DOMContentLoaded', function () {

	if (btnVideoSave != null) {
		loadVideosData()
		sendVideoListener()
		linkVideoListener()
	}

	if (btnVideoClear != null) {
		clearVideoListener()
	}

	if (btnVideoDelete != null) {
		deleteVideoListener()
	}

	if (btnVideoUpdate != null) {
		updateVideoListener()
	}

})

function updateVideoListener() {
	btnVideoUpdate.addEventListener('click', function (event) {
		event.preventDefault()
	
		if (document.getElementById("id").value.length == 0) {
			alertify.alert("No se ha seleccionado ningun video!")
			return false
		} 

		var fields = {
			id: document.getElementById("id").value,
		 	name: document.getElementById("title").value,
		 	link: document.getElementById("link").value,
		 	description: document.getElementById("description").value
		}

		const xhr = new httpRequest()
		xhr.open('POST', '../../api/videos/update-video.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-video-body')
						btnVideoClear.click()
						getVideos(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function deleteVideoListener () {
	btnVideoDelete.addEventListener('click', function (event) {
		event.preventDefault();

		if (document.getElementById("id").value.length == 0) {
			alertify.alert("No se ha seleccionado ningun video!")
			return false
		} 

		var fields = {
			id: document.getElementById("id").value
		}

		const xhr = new httpRequest()
		xhr.open('POST', '../../api/videos/delete-video.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-video-body')
						btnVideoClear.click()
						getVideos(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function clearVideoListener () {
	btnVideoClear.addEventListener('click', function (event) {
		event.preventDefault()
		document.getElementById("id").value = ""
		document.getElementById('title').value = ""
		document.getElementById('link').value = ""
		document.getElementById('description').value = ""
		document.querySelector('.video').src = "https://www.youtube.com/embed/"
	})
}

function sendVideoListener() {
	btnVideoSave.addEventListener('click', function (event) {
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
						const table = document.querySelector('.table-video-body')
						getVideos(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function linkVideoListener() {
	txtLink.addEventListener('change', function (event) {
		var link = event.target.value
		document.querySelector('.video').src = "https://www.youtube.com/embed/" + link.split("watch?v=")[1]
	})
}

function getVideos (dataTable) {
	const xhr = new httpRequest()
	xhr.open('GET', '../../api/videos/get-videos.php')
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status) {
			const response = JSON.parse(xhr.responseText)
			if (!response[0].error) {
				const node = response.length
				var tr = null, id = null, name = null, description = null, action = null
				
				dataTable.innerHTML = ""
				
				for (var i = 0; i < node; i++) {

					tr = document.createElement("tr")
					id = document.createElement("td")
					name = document.createElement("td")
					description = document.createElement("td")
					action = document.createElement("td")

					var button = document.createElement("button")
					button.appendChild(document.createTextNode("Ver"))

					button.setAttribute('class', 'btn btn-outline-dark')
					button.setAttribute('videoId', response[i].id)
					button.setAttribute('name', response[i].name)
					button.setAttribute('link', response[i].link)
					button.setAttribute('description', response[i].description)

					button.onclick = function (event) {
						const element = event.target
						editVideo(element)
					}

					id.appendChild(document.createTextNode(response[i].id))
					name.appendChild(document.createTextNode(response[i].name))
					description.appendChild(document.createTextNode(response[i].description))
					action.appendChild(button)

					tr.appendChild(id)
					tr.appendChild(name)
					tr.appendChild(description)
					tr.appendChild(action)

					dataTable.appendChild(tr)
				}
			}
		}
	}
	xhr.send(null)
}

function editVideo (element) {
	var object = {
		id: element.getAttribute('videoId'),
		name: element.getAttribute('name'),
		link: element.getAttribute('link'),
		description: element.getAttribute('description')
	}

	document.getElementById("id").value = object.id
	document.getElementById('title').value = object.name
	document.getElementById('link').value = object.link
	document.getElementById('description').value = object.description
	document.querySelector('.video').src = "https://www.youtube.com/embed/" + (object.link).split("watch?v=")[1]
}

function loadVideosData () {
	const table = document.querySelector('.table-video-body')
	getVideos(table)
}