<?php

	function view($path, $payload = []) {

		extract($payload);
		require_once VIEW_PATH . $path . ".php";

	}

	function csrf() {
		$signer = new \Kunststube\CSRFP\SignatureGenerator($_ENV['SECRET']);
		$_SESSION['csrf'] = $signer;
		return $signer->getSignature();
	}

	function checkCSRF() {
		
		$signer = $_SESSION['csrf'];

		if ($_POST) {
			
			if(isset($signer = $_SESSION['csrf']))
			
			if (!$signer->validateSignature($_POST['_token'])) {
				header('HTTP/1.0 400 Bad Request');
				exit;
			}
		}
	}