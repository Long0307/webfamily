<?php

require_once("../../Model/admin/HomeModel.php");

class HomeController extends HomeModel
{	
	public function header()
	{
		$getFavicon = $this->selectOne('thong_tin_web','id',1);
		return compacts("admin/inc/header",	
			[ 	
				'getFavicon' => $getFavicon,
				
			]);
	}

	public function navbar(){
		return views("admin/inc/navbar");
	}
	
	public function footer(){
		return views("admin/inc/footer");
	}

	public function content()
	{	

		$getAllCate = $this->selectAllRow('danh_muc_san_pham');

		$getAllPro = $this->selectAllRow('san_pham');

		$getAllNews = $this->selectAllRow('bai_viet');

		$getAllOrder = $this->selectAllRow('don_dat_hang');

		$getAllImportPro = $this->selectAllRow('phieu_nhap');	

		$getAllContact = $this->selectAllRow('y_kien_khach_hang');	

		$getAllMember = $this->selectAllRow('nguoi_dung_quan_tri');

		$selectOrders = $this->paginationOrderNew('don_dat_hang','Created_time',5,'desc');

		return compacts("admin/content/content",	
			[ 	
				'selectOrders' => $selectOrders,
				'getAllCate' => $getAllCate,
				'getAllPro' => $getAllPro,
				'getAllNews' => $getAllNews,
				'getAllOrder' => $getAllOrder,
				'getAllImportPro' => $getAllImportPro,
				'getAllContact' => $getAllContact,
				'getAllMember' => $getAllMember,
			]);
	}
}

;?>