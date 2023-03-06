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
						'quantity' 	=> $_POST['quantity'] + $cart[$id]['quantity']

					);
				}else{
					unset($cart[$id]);
				}

			}else{

				require_once("../../Model/admin/Model.php");

				$connectModel = new BaseModel();

				$selectOne = $connectModel->selectOne('san_pham','ID',$id);

				$cart = $_SESSION['cart'];

				$cart[$id] = array(

					'name' 		=> $selectOne[0]['Tensp'],
					'image' 	=> $selectOne[0]['HinhAnhSP'],
					'price-new' => $selectOne[0]['Gia'],
					'quantity' 	=> $_POST['quantity']

				);

				print_r($cart[$id]['quantity']);

			}
			$_SESSION['cart'] = $cart;

		}else{

			require_once("../../Model/admin/Model.php");

			$connectModel = new BaseModel();

			$selectOne = $connectModel->selectOne('san_pham','ID',$id);

			$_SESSION['cart'][$id] = array(

				'name' 		=> $selectOne[0]['Tensp'],
				'image' 	=> $selectOne[0]['HinhAnhSP'],
				'price-new' => $selectOne[0]['Gia'],
				'quantity' 	=> $_POST['quantity']

			);

			// print_r($_SESSION['cart'][$id]['quantity']);



		}
	}
?>