<?php

	ob_start();
	session_start(); 
	// require_once("Database/config.php");


	if(isset($_POST['masanpham']) && isset($_POST['quantity'])){

		$id       = $_POST['masanpham'];

		if(isset($_SESSION['cart'])){

			$cart = $_SESSION['cart'];

			if(array_key_exists($id, $cart)){

				if($_POST['quantity']){
					$cart[$id] = array(

						'name' 		=> $cart[$id]['name'],
						'image' 	=> $cart[$id]['image'],
						'price-new' => $cart[$id]['price-new'],
						'quantity' 	=> $_POST['quantity']

					);
				}else{
				unset($cart[$id]);
			}

			}
			$_SESSION['cart'] = $cart;
			// print_r($cart);
			// $total = 0;
			// $number = 0;

			// foreach ($cart as $value) {
				
			// 	$number += (int)$value['quantity'];
			// 	$total += (int)$value['quantity']*(int)$value['price-new'];


			// }

			// echo $number."+". number_format($total, 0, '', ',')."đ";
		}
	}
?>