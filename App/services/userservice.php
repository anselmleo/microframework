<?php

	namespace App\Services;

	use App\Repository\UserRepository;

	Class UserService 
	{
		protected $userRepo;

		public function __construct(UserRepository $userRepo) {
			$this->userRepo = $userRepo;
		}

		public function getAllUsers() {
			return $this->userRepo->all();
		}
	}