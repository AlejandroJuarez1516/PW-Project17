<?php 
	class Database {
		private static $connection;

		public static function connect () {
			$server = 'localhost';
			$database = 'sansalvador';
			$username = 'root';
			$password = '';
			$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8');
			self::$connection = null;
			try {
				self::$connection = new PDO("mysql:host=".$server."; dbname=".$database, $username, $password, $options);
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $exception) {
	            die($exception->getMessage());
	        }
		}

		public static function disconnect () {
			self::$connection = null;
		}

		public static function executeRow ($query, $values) {
			self::connect();
			$statement = self::$connection->prepare($query);
			$statement->execute($values);
			self::disconnect();
		}

		public static function getRow ($query, $values = null) {
			self::connect();
			$statement = self::$connection->prepare($query);
			$statement->execute($values);
			self::disconnect();
			return $statement->fetch(PDO::FETCH_BOTH);
		}

		public static function getData ($query, $values) {
			self::connect();
	        $statement = self::$connection->prepare($query);
	        $statement->execute($values);
	        self::desconnect();
	        return $statement->fetchAll(PDO::FETCH_BOTH);
		}
	}
?>