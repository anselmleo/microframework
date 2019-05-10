<?php

	namespace App\Repository;

	use Microframework\db\DBConn;

	Class UserRepository
	{
		public function all() {
			$sql = "SELECT * FROM user";
			$result = DBConn::_query($_ENV['DB'], $sql, []);
			return $result->fetch();
		}
	}