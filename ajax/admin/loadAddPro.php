<?php
	
	require_once("../../Model/admin/Model.php");

	if(isset($_POST['masanpham'])){

		$connectModel = new BaseModel();

		$getPro = $connectModel->selectJoin2Where('san_pham','IDDanhMuc','danh_muc_san_pham','ID','ID',$_POST['masanpham']);

		foreach ($getPro as $value) {

			$gianhap = ($value['Gia']/100)*90;

			echo $value[0]."+".$value['Tensp']."+".$value['TenDanhMuc']."+".$value['HinhAnhSP']."+".number_format($gianhap, 0, '', ',')." VNĐ"."+".$gianhap;
		}
		
		// echo "<pre>";
		// print_r($getPro);
		// echo "<pre>";
	}
?>