<?php
	ob_start();
	session_start();

	if(isset($_POST['masanpham']) && isset($_POST['quantity'])){
		$id       = $_POST['masanpham'];
		if($_POST['quantity'] == 0){
			unset($_SESSION['cart'][$id]);

		}
	}

?>