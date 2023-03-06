<?php

	require_once("Database/config.php");

	require_once("Controller/customer/Controller.php");

	spl_autoload_register('loadfile');

	function loadfile($className){

		$folder = "Controller/customer/";

		$ext = ".php";

		$fullpath = $folder.$className.$ext;
		
		$refullvalue = str_replace('\\', '/', $fullpath);

		require_once($refullvalue);

	}

	require_once("router.php");

?>