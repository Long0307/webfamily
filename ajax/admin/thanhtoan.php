<?php

	session_start();

	$subtotal = 0;	

	// echo "<pre>";
	// print_r($_SESSION['addpro']);
	// echo "<pre>";
	foreach ($_SESSION['addpro'] as $key => $value) {

		$subtotal += $value['total'];

	}	

	$_SESSION['total'] = $subtotal;

	echo number_format($_SESSION['total'], 0, '', ',')." VNĐ";

?>