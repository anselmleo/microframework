<?php
	
	namespace Microframework\Shell;
	
	Class Kernel
	{
		public static function bootstrap() {
			require_once 'bootstrap.php';
			require_once 'start.php';
		}
	}