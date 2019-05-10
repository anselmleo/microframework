<?php

	namespace Microframework\DB;

	Class DBResult 
	{	

		protected $dbconn;
		protected $sql;
		protected $params;
		protected $stmt;


		public function __construct($dbconn, $sql, $params) {
			$this->dbconn = $dbconn;
			$this->sql = $sql;
			$this->params = $params;
		}

		public function fetch() {
			$this->stmt = $this->dbconn->prepare($this->sql);
			$this->stmt->execute($this->params);

			$record = $this->makeObjectFrom($this->stmt);

			return $record;

		}

		public function getStmt(){
			return $this->stmt;
		}

		private function makeObjectFrom($stmt) {

			$resultSet = [];

			while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
				$resultSet[] = (object) $row;
			}

			return $resultSet;
		}
	}