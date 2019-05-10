<?php

	namespace Microframework\DB;

	Class DBConn 
	{
		protected $conn;
		protected static $instance;
		protected static $result;

		public function __construct($config) {
			
			$dbname = $config['DBNAME'];
			$dbhost = $config['DBHOST'];
			$dbuser = $config['DBUSER'];
			$dbpass = $config['DBPASS'];


			try {
				$this->conn = new \PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public static function getInstance() {
			if(self::$instance != null) {
				return self::$instance;
			}

			self::$instance = new DBConn($_ENV);
			return self::$instance;
		}	

		public function getConnection() {
			return $this->conn;
		}

		public static function _query($dbconn, $sql, $params) {
			self::$result = new DBResult($dbconn, $sql, $params);
			return self::$result;
		}

	}