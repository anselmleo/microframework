<?php

	namespace Swallow\controller;

	Class Post 
	{
		protected $conn;
		protected $db = [
			'How INEC rigged the election', 
			'Atiku lines up election result cases'
		];

		public function __construct() {
			$dbname = $_ENV['DBNAME'];
			$dbhost = $_ENV['DBHOST'];
			$dbuser = $_ENV['DBUSER'];
			$dbpass = $_ENV['DBPASS'];

			try {
				$this->conn = new \PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function edit($post_id) {
			$post = $this->db[$post_id]; 
			
			return view('edit-post', compact('post'));
		}

		public function test() {
			$fname = "Anselm";
			$lname = "Tman";
			$email = "anselm.tman@gmail.com";
			$password = password_hash("transilvania2019", PASSWORD_BCRYPT);

			$statement = 
			$this->conn->prepare("INSERT INTO user (fname,lname,email,password) VALUES(:fn,:ln,:e,:p)");

			// $statement->bindParam(":fn",$fname);
			// $statement->bindParam(":ln",$lname);
			// $statement->bindParam(":e",$email);
			// $statement->bindParam(":p",$password);

			// $statement->execute();

			$fname2 = "Tolu";
			$lname2 = "Ashogbon";
			$email2 = "toluashogbon@gmail.com";
			$password2 = password_hash("reckitralph2019", PASSWORD_BCRYPT);

			$data = [
				":fn"=>$fname2,
				":ln"=>$lname2,
				":e"=>$email2,
				":p"=>$password2
			];

			$statement->execute($data);

		}

		public function write() {
			
			$statement = $this->conn->prepare("SELECT * FROM user");
			$statement->execute();
			while($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
				echo $row['lname'];
			}


		}

		public function where($user_id) {
			$statement = $this->conn->prepare("SELECT * FROM user WHERE id=:id");
			$statement->bindParam(":id",$user_id);
			$statement->execute();
			var_dump($statement->fetch());
		}

		public function create() {
			return view('register');
		}

		public function store() {
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

			$statement = $this->conn->prepare("INSERT INTO user (fname,lname,email,password) VALUES(:fn,:ln,:e,:p)");
			$data = [
				":fn"=>$fname,
				":ln"=>$lname,
				":e"=>$email,
				":p"=>$password
			]; 

			$statement->execute($data);
		}
	}