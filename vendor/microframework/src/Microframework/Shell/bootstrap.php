<?php

	require_once APP_PATH."/vendor/microframework/src/microframework/lib/Helper.php";
	//require_once '../lib/Helper.php';
	
	$_SERVER['REQUEST_URI'];

	$url = $_SERVER['REQUEST_URI'];

	$route = explode('/', substr($url, 1));

	$request = array_slice($route, 0, 2);

	$params = array_slice($route, 2);
