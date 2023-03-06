<?php

	$error = array();
	function redirect($view)
	{
		return header("location:View/".$view.".php");	
	}

	function views($view)
	{
		return require_once("View/".$view.".php");	
	}

	function compacts($view,array $data = [])
	{
		return require_once("View/".$view.".php");	
	}
?>