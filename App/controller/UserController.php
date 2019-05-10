<?php
	 namespace App\Controller;

	 use App\Repository\UserRepository as UserRepo;
	 use Microframework\DB\DBConn as DBConn;
	 use App\Services\UserService as UserService;

	 Class UserController 
	 {
	 	protected $userService;

	 	public function __construct(UserService $userService) {
	 		$this->userService = $userService;
	 	}
	 	
	 	public function show() {
			$allUsers = $this->userService->getAllUsers();
			var_dump($allUsers);
		 }
		 
		 public function showLogin() {
			return view('login');
	 	}
	 }