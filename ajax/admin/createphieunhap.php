<?php
	session_start();

	require_once("../../Model/admin/Model.php");

	$connectModel = new BaseModel();

	$TongTienNhap = $_SESSION['total'];

	$sqlPhieuNhap = "INSERT INTO phieu_nhap(TongTienNhap) VALUES ('$TongTienNhap')";

	$nhap = "TongTienNhap";

	$value = "('".$TongTienNhap."')";

	$insertGetID = $connectModel->insertGetID('phieu_nhap',$nhap,$value);

	foreach ($_SESSION['addpro'] as $key => $value) {	
		
		$soluong = $value['soluong'];

		$dongia = $value['dongia'];

		$total = $value['total'];

		$truong = "MaPhieuNhap,MaSanPham,SoLuongNhap,GiaNhap,TongTien";

		$value = "('".$insertGetID."'".","."'".$key."'".","."'".$soluong."'".","."'".$dongia."'".","."'".$total."')";

		$detailPhieunhap = $connectModel->insert('chi_tiet_phieu_nhap',$truong,$value);

		if($detailPhieunhap){

			$Masp = "ID";

			$ktraSP = $connectModel->selectOne('san_pham',$Masp,$key);

			if($ktraSP){

				$SoLuongTon = $ktraSP[0]['SoLuongTon'] + $soluong;

				$updateSLT = "SoLuongTon = "."'".$SoLuongTon."'";

				$updateSLT = $connectModel->update('san_pham',$updateSLT,"ID",$key);

				$strupdate = "TongGiaTri = SoLuongTon * Gia";

				$updateTGT = $connectModel->updateAll('san_pham',$strupdate);
		
			}

		}
	}

	unset($_SESSION['addpro']);
?>