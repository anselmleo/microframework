<?php

	start_session();
	
	define('APP_PATH', dirname(dirname(__FILE__)));
	define('CONTROLLER_PATH', APP_PATH.'/app/controller/');
	define('VIEW_PATH', APP_PATH.'/app/view/');

	#import composer autoload file
	require_once APP_PATH."/vendor/autoload.php";

	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();

	$dotenv = Dotenv\Dotenv::create(APP_PATH);
	$dotenv->load();

	//require_once APP_PATH."/kernel/bootstrap.php";
	//require_once APP_PATH."/kernel/start.php";
	// echo 'say hello';

	$dbConn = \Microframework\db\DBConn::getInstance();
	
	$_ENV['DB'] = $dbConn->getConnection();

	\Microframework\Shell\Kernel::bootstrap();
