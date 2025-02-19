function httpRequest () {
	return new XMLHttpRequest() || new ActiveXObject("MSXML2.XMLHTTP") || new ActiveXObject("Microsoft.XMLHTTP") || null
}

const btnBlogFile = document.getElementById("btn-blog-file") || null
const btnBlogClear = document.getElementById("btn-blog-clear") || null
const btnBlogUpdates = document.getElementById("btn-blog-update") || null
const btnBlogDelete = document.getElementById("btn-blog-delete") || null
const btnBlogSave = document.getElementById("btn-blog-send") || null

document.addEventListener('DOMContentLoaded', function () {
	if (btnBlogFile != null) {
		loadBlogData()
		CKEDITOR.replace('content')
		fileListener()
	}	

	if (btnBlogSave != null) {
		sendBlogListener()
	}

	if (btnBlogClear != null) {
		clearBlogListener()
	}

	if (btnBlogUpdates != null) {
		updateBlogListener()
	}

	if (btnBlogDelete != null) {
		deleteBlogListener()
	}
})

function sendBlogListener() {
	btnBlogSave.addEventListener('click', function (event) {
		event.preventDefault()
		var fields = {
		 	title: document.getElementById("title").value,
		 	content: CKEDITOR.instances.content.getData(),
		 	image: result
		}
		
		const xhr = new httpRequest()
		xhr.open('POST', '../../api/blogs/save-blog.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-blog-body')
						btnBlogClear.click()
						getBlogs(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function clearBlogListener() {
	btnBlogClear.addEventListener('click', function (event) {
		event.preventDefault()
		CKEDITOR.instances.content.setData("")
		document.getElementById("title").value = ""
		document.getElementById("id").value = ""
		document.getElementById('blog-img').src = "http://localhost/PW-Project17/assets/images/noImage.jpg"
	})
}

function updateBlogListener () {
	btnBlogUpdates.addEventListener('click', function (event) {
		event.preventDefault()
	
		if (document.getElementById("id").value.length == 0) {
			alertify.alert("No se ha seleccionado ningun blog!")
			return false
		} 

		var fields = {
			id: document.getElementById("id").value,
		 	title: document.getElementById("title").value,
		 	image: document.getElementById("blog-img").src,
		 	content: CKEDITOR.instances.content.getData()
		}

		const xhr = new httpRequest()
		xhr.open('POST', '../../api/blogs/update-blog.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-blog-body')
						btnBlogClear.click()
						getBlogs(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function deleteBlogListener () {
	btnBlogDelete.addEventListener('click', function (event) {
		event.preventDefault();

		if (document.getElementById("id").value.length == 0) {
			alertify.alert("No se ha seleccionado ningun blog!")
			return false
		} 

		var fields = {
			id: document.getElementById("id").value
		}

		const xhr = new httpRequest()
		xhr.open('POST', '../../api/blogs/delete-blog.php')
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
		xhr.onreadystatechange = function () {
			if(xhr.readyState == 4 && xhr.status == 200) {
				const response = JSON.parse(xhr.responseText)
				if (response[0].success) {
					alertify.alert(response[0].message , function (event) {
						event.preventDefault()
						const table = document.querySelector('.table-blog-body')
						btnBlogClear.click()
						getBlogs(table)
					})
				} else {
					alertify.alert(response[0].message)
				}
			}
		}
		xhr.send(JSON.stringify(fields))
	})
}

function fileListener () {
	btnBlogFile.addEventListener('click', function (event) {
		event.preventDefault()
		document.getElementById("file").click()
	})
}

function loadBlogData () {
	const table = document.querySelector('.table-blog-body')
	getBlogs(table)
}

function getBlogs (dataTable) {
	const xhr = new httpRequest()
	xhr.open('GET', '../../api/blogs/get-blogs.php')
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status) {
			const response = JSON.parse(xhr.responseText)
			if (!response[0].error) {
				const node = response.length
				var tr = null, id = null, title = null, postDate = null, action = null
				
				dataTable.innerHTML = ""
				
				for (var i = 0; i < node; i++) {

					tr = document.createElement("tr")
					id = document.createElement("td")
					title = document.createElement("td")
					postDate = document.createElement("td")
					action = document.createElement("td")

					var button = document.createElement("button")
					button.appendChild(document.createTextNode("Ver"))

					button.setAttribute('class', 'btn btn-outline-dark')
					button.setAttribute('blogId', response[i].id)
					button.setAttribute('title', response[i].title)
					button.setAttribute('image', response[i].image)
					button.setAttribute('content', response[i].blogContent)

					button.onclick = function (event) {
						const element = event.target
						editblog(element)
					}

					id.appendChild(document.createTextNode(response[i].id))
					title.appendChild(document.createTextNode(response[i].title))
					postDate.appendChild(document.createTextNode(response[i].postDate))
					action.appendChild(button)

					tr.appendChild(id)
					tr.appendChild(title)
					tr.appendChild(postDate)
					tr.appendChild(action)

					dataTable.appendChild(tr)
				}
			}
		}
	}
	xhr.send(null)
}

function editblog (element) {
	var object = {
		id: element.getAttribute('blogId'),
		title: element.getAttribute('title'),
		image: element.getAttribute('image'),
		content: element.getAttribute('content')
	}
	document.getElementById("id").value = object.id
	document.getElementById('title').value = object.title
	document.getElementById('blog-img').src = "data:image/jpg;base64" + object.image
	CKEDITOR.instances.content.setData(object.content)
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