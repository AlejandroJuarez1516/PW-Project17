<?php
	
	class initDB
	{
		protected $connector;
	
		public function __construct() {
			$this->connector = new PDO('mysql:host=127.0.0.1', 'root', '');
		}

		public function create_database () {
			

			/* Creación de base de datos */
			$san_salvador = $this->connector->prepare('CREATE DATABASE IF NOT EXISTS  sansalvador COLLATE utf8_unicode_ci');
			$san_salvador->execute();
			/* Se requiere usar la base de datos anteriormente creada */
			if ($san_salvador) {
				$san_salvador = $this->connector->prepare('USE sansalvador');
				$san_salvador->execute();
			}

			if ($san_salvador) {
				/* Creación de la tabla configuración */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS setup (
				   id int(11) NOT NULL AUTO_INCREMENT,
				   lang varchar(2) NOT NULL,
				   state bit NOT NULL,
				   PRIMARY KEY(id)
				)');
				$san_salvador->execute();
				/* Creacion de la tabla usuarios */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS users (
					id int(11) NOT NULL AUTO_INCREMENT,
					name varchar(50) NOT NULL,
					last_name varchar(50) NOT NULL,
					email varchar(100) NOT NULL UNIQUE,
					password varchar(100) NOT NULL,
					user_type int(11) NOT NULL,
					PRIMARY KEY (id)
				)');
				$san_salvador->execute();
				/* Creación de tabla blog */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS blogs (
					id int(11) NOT NULL AUTO_INCREMENT,
					title varchar(100) NOT NULL,
					id_usuario int (11) NOT NULL,
					blog_date date NOT NULL,
					image longblob NOT NULL,
					content text NOT NULL,
					tags text,
					PRIMARY KEY(id),
					FOREIGN KEY(id_usuario) REFERENCES users(id) ON UPDATE CASCADE ON DELETE RESTRICT
				)');
				$san_salvador->execute();
				/* Creación de tabla de lugares */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS places (
					id int(11) NOT NULL AUTO_INCREMENT,
					name varchar(100) NOT NULL,
					map text NOT NULL,
					description varchar(100) NOT NULL,
					PRIMARY KEY (id)
				)');
				$san_salvador->execute();
				/* Creación de tabla de Actividades */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS events (
					id int(11) NOT NULL AUTO_INCREMENT,
					name varchar(100) NOT NULL, 
					id_place int(11) NOT NULL,
					description text NOT NULL,
					event_date date NOT NULL,
					image varchar(100) NOT NULL,
					PRIMARY KEY(id),
					FOREIGN KEY (id_place) REFERENCES places(id) ON UPDATE CASCADE ON DELETE RESTRICT
				)');
				$san_salvador->execute();
				/* Creación de contrataciones */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS hirings (
					id int(11) NOT NULL AUTO_INCREMENT,
					name_enterprise varchar(100) NOT NULL,
					address_enterprise varchar(100) NOT NULL,
					phone_enterprise varchar(100) NOT NULL,
					contact varchar(100) NOT NULL,
					hiring_name varchar(100) NOT NULL,
					description text,
					PRIMARY KEY(id)
				)');
				$san_salvador->execute();
				/* Creación de tabla Galería */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS gallery (
					id int(11) NOT NULL AUTO_INCREMENT,
					name varchar(11) NOT NULL,
					gallery_date date NOT NULL,
					PRIMARY KEY(id)
				)');
				$san_salvador->execute();
				/* Creando tabla detalle de galería */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS gallery_entry (
					id int(11) NOT NULL AUTO_INCREMENT,
					url_image varchar(100) NOT NULL,
					id_gallery int(11) NOT NULL,
					description text,
					PRIMARY KEY(id),
					FOREIGN KEY (id_gallery) REFERENCES gallery(id) ON UPDATE CASCADE ON DELETE RESTRICT
				)');
				$san_salvador->execute();
				/* Creando tabla de publicaciones */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS post (
					id int(11) NOT NULL AUTO_INCREMENT,
					id_user int(11) NOT NULL,
					post text NOT NULL,
					type int(11) NOT NULL,
					date_post date NOT NULL,
					PRIMARY KEY (id)
				)');
				$san_salvador->execute();
				/* Cración de la tabla video post */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS video_post (
					id int(11) NOT NULL AUTO_INCREMENT,
					id_post int(11) NOT NULL,
					link text NOT NULL,
					PRIMARY KEY (id),
					FOREIGN KEY (id_post) REFERENCES post(id) ON UPDATE CASCADE ON DELETE RESTRICT
				)');
				$san_salvador->execute();
			}
		}
	}
	$db = new initDB();
	$db->create_database();
?>