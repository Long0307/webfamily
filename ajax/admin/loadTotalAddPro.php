<?php
session_start();
// require_once("../../Model/admin/Model.php");
$total = 0;

// $_SESSION['addpro'] = [];

if(isset($_POST['masanpham']) && isset($_POST['soluong'])){
	if(isset($_POST['dongia'])){

		$soluong = $_POST['soluong'];

		$id = $_POST['masanpham'];

		$dongia = $_POST['dongia'];

		$error = [];

		if($soluong == 0){

			$error[] = "Bạn chưa nhập sách này";

		}else{

			$total = $soluong * $dongia; 

			echo number_format($total, 0, '', ',')." VNĐ";

			$_SESSION['addpro'][$id]['soluong'] = $soluong;

			$_SESSION['addpro'][$id]['dongia'] = $dongia;

			$_SESSION['addpro'][$id]['total'] = $total; 

		}
	}
}