<?php

	list($controller, $method) = $request;

		$controller_path = CONTROLLER_PATH.$controller.".php";

		if(file_exists($controller_path)){

			 $controllerWithNamespace = '\App\controller\\'.$controller;
			// $controller = new $controllerWithNamespace; 

			$container = new \Microframework\Lib\Container;
			$controller = $container->resolve($controllerWithNamespace);

			if(empty($method)) {
				echo "No action has been to set to run on this ".$controller."!";
				exit();
			} else {
				call_user_func_array([$controller, $method], $params);
			}

		} else {
			
			require_once VIEW_PATH."four0four.php";

			exit();
		}