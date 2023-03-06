<?php
	require_once("../../Model/admin/ProductInventoryModel.php");
	$error = array();
	$success = array();

	class ProductInventoryController extends ProductInventoryModel
	{
		public function pagination($page = 0){

		if($page == "" || $page == 1){
			$page = 0;
		}else{
			$page = ($page*5)-5;
		}

		if(isset($_GET['action']) && ($_GET['action'] == "info")){

			$id = $_GET['id'];

			// $importPro = $this->selectJoin2Where('phieu_nhap','MaPhieuNhap','chi_tiet_phieu_nhap','MaPhieuNhap','MaPhieuNhap',$id);

			$detailOrder = $this->selectJoin3Where('chi_tiet_phieu_nhap','phieu_nhap','san_pham','MaPhieuNhap','MaPhieuNhap','MaSanPham','ID','MaPhieuNhap',$id);

			return compacts("admin/content/productInventory/info",	
			[ 	
				'detailOrder' => $detailOrder
			]);

		}else if(isset($_GET['action']) && ($_GET['action'] == "delete")){

			$id = $_GET['id'];

			$delete = $this->delete('phieu_nhap','MaPhieuNhap',$id);

			$selectAll = $this->selectAll('san_pham');

			$selectAllImportPro = $this->selectAll('phieu_nhap');

			$pagiImportPro = $this->paginationImportPro('phieu_nhap',$page,5);

			$selectImportPro = $this->selectImportPro('phieu_nhap',5);

			$success['deletesuc'] = "<p style='color:green;'>Xoá thành công</p>";

			return compacts("admin/content/productInventory/index",	
				[ 	
					'pagiImportPro' => $pagiImportPro,
					'selectImportPro' => $selectImportPro,
					'selectAll' => $selectAll,
					'selectAllImportPro' => $selectAllImportPro,
					'success' => $success['deletesuc']
				]);

		}elseif(isset($_POST['search'])){

			$osearch = trim($_POST['date']);

			$search = $this->search('phieu_nhap','NgayNhap',$osearch);

			$selectAll = $this->selectAll('san_pham');

			$selectAllImportPro = $this->selectAll('phieu_nhap');

			$pagiImportPro = $this->paginationImportPro('phieu_nhap',$page,5);

			$selectImportPro = $this->selectImportPro('phieu_nhap',5);

			return compacts("admin/content/productInventory/index",	
				[ 	
					'pagiImportPro' => $pagiImportPro,
					'selectImportPro' => $selectImportPro,
					'selectAll' => $selectAll,
					'selectAllImportPro' => $selectAllImportPro,
					'search' => $search
				]);
		}
 
		$selectAll = $this->selectAll('san_pham');

		$selectAllImportPro = $this->selectAll('phieu_nhap');

		$pagiImportPro = $this->paginationImportPro('phieu_nhap',$page,5);

		$selectImportPro = $this->selectImportPro('phieu_nhap',5);

		return compacts("admin/content/productInventory/index",	
			[ 	
				'pagiImportPro' => $pagiImportPro,
				'selectImportPro' => $selectImportPro,
				'selectAll' => $selectAll,
				'selectAllImportPro' => $selectAllImportPro,
			]);


		}

		public function getAdd(){
			return views("admin/content/ImportPro/add");	
		}

	}
?>