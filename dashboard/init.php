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
					lastname varchar(50) NOT NULL,
					email varchar(100) NOT NULL UNIQUE,
					password varchar(100) NOT NULL,
					usertype int(11) NOT NULL,
					PRIMARY KEY (id)
				)');
				$san_salvador->execute();
				/* Creación de tabla blog */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS blogs (
					id int(11) NOT NULL AUTO_INCREMENT,
					title varchar(100) NOT NULL,
					user_id int (11) NOT NULL,
					blog_date date NOT NULL,
					image longblob NOT NULL,
					content text NOT NULL,
					tags text,
					PRIMARY KEY(id),
					FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE RESTRICT
				)');
				$san_salvador->execute();
				/* Creación de tabla de lugares */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS videos (
					id int(11) NOT NULL AUTO_INCREMENT,
					name varchar(100) NOT NULL,
					link varchar(100) NOT NULL,
					description varchar(100) NOT NULL,
					PRIMARY KEY (id)
				)');
				$san_salvador->execute();
				/* Creación de tabla Galería */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS gallery (
					id int(11) NOT NULL AUTO_INCREMENT,
					gallery_name varchar(11) NOT NULL,
					gallery_date date NOT NULL,
					PRIMARY KEY(id)
				)');
				$san_salvador->execute();
				/* Creando tabla detalle de galería */
				$san_salvador = $this->connector->prepare('
				CREATE TABLE IF NOT EXISTS gallery_entry (
					id int(11) NOT NULL AUTO_INCREMENT,
					image_url varchar(100) NOT NULL,
					gallery_id int(11) NOT NULL,
					description text,
					PRIMARY KEY(id),
					FOREIGN KEY (gellery_id) REFERENCES gallery(id) ON UPDATE CASCADE ON DELETE RESTRICT
				)');
				$san_salvador->execute();
			}
		}
	}
	$db = new initDB();
	$db->create_database();
?>