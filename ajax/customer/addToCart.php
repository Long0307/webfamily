<?php
ob_start();
session_start();

if(isset($_POST['masanpham'])){
	$id = $_POST['masanpham'];

	require_once("../../Model/admin/Model.php");

	$connectModel = new BaseModel();

	$selectOne = $connectModel->selectOne('san_pham','ID',$id);

	if(!isset($_SESSION['cart'])){

		$cart[$id] = array(

			'name' 		=> $selectOne[0]['Tensp'],
			'image' 	=> $selectOne[0]['HinhAnhSP'],
			'price-new' => $selectOne[0]['Gia'],
			'quantity' 	=> 1
		);

	}else{

		$cart = $_SESSION['cart'];
		if(array_key_exists($id, $cart)){
			$cart[$id] = array(

				'name' 		=> $selectOne[0]['Tensp'],
				'image' 	=> $selectOne[0]['HinhAnhSP'],
				'price-new' => $selectOne[0]['Gia'],
				'quantity' 	=> (int)$cart[$id]['quantity'] + 1

			);

		}else{

			$cart[$id] = array(

				'name' 		=> $selectOne[0]['Tensp'],
				'image' 	=> $selectOne[0]['HinhAnhSP'],
				'price-new' => $selectOne[0]['Gia'],
				'quantity' 	=> 1
			);

		}
	}

	$_SESSION['cart'] = $cart;
	// print_r($_SESSION['cart']);

	$total = 0;
	$number = 0;

	foreach ($cart as $value) {

		$number += (int)$value['quantity'];
		$total += (int)$value['quantity']*(int)$value['price-new'];


	}

	echo $number."+". number_format($total, 0, '', ',')." VNĐ";

}
?>