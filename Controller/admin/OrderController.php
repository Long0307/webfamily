<?php
	
	require_once("../../Model/admin/OrderModel.php");

	class OrderController extends OrderModel
	{
		
		public function pagination($page = 0){

		if($page == "" || $page == 1){
			$page = 0;
		}else{
			$page = ($page*5)-5;
		}

		if(isset($_GET['action']) && ($_GET['action'] == "info")){

			$id = $_GET['id'];

			$detailOrder = $this->selectJoin3Where('chi_tiet_don_hang','don_dat_hang','san_pham','Order_ID','ID','Product_ID','ID','Order_ID',$id);
			// print_r($detailOrder);
			return compacts("admin/content/order/info",	
			[ 	
				'detailOrder' => $detailOrder
			]);

		}else if(isset($_GET['action']) && ($_GET['action'] == "photo")){

			$id = $_GET['id'];

			$keyupdate = "status = 2";

			$updateStatus = $this->update('don_dat_hang',$keyupdate,'ID',$id);

			$detailOrder = $this->selectJoin3Where('chi_tiet_don_hang','don_dat_hang','san_pham','Order_ID','ID','Product_ID','ID','Order_ID',$id);
			
			return compacts("admin/content/order/photo1",	
			[ 	
				'detailOrder' => $detailOrder
			]);

		}else if(isset($_GET['action']) && ($_GET['action'] == "delete")){

			$id = $_GET['id'];

			$delete = $this->delete('don_dat_hang','ID',$id);

			$selectAll = $this->selectAll('don_dat_hang');

			$pagiOrders = $this->paginationOrder('don_dat_hang',$page,5); 

			$selectOrders = $this->selectOrder('don_dat_hang',5);

			return compacts("admin/content/order/index",	
				[ 	
					'pagiOrders' => $pagiOrders,
					'selectOrders' => $selectOrders,
					'selectAll' => $selectAll 
				]);

		}elseif(isset($_POST['searchdonhang'])){

			if((!empty($_POST['info'])) && (!empty($_POST['date']))) {

				$sdt = trim($_POST['info']);
				$info = substr($sdt, 1);

				$search = $this->searchMulCon('don_dat_hang','SoDienThoai','Created_time',$info,trim($_POST['date']));

				$selectAll = $this->selectAll('don_dat_hang');

				$pagiOrders = $this->paginationOrder('don_dat_hang',$page,5);

				$selectOrders = $this->selectOrder('don_dat_hang',5);

				return compacts("admin/content/order/index",	
					[ 	
						'pagiOrders' => $pagiOrders,
						'selectOrders' => $selectOrders,
						'selectAll' => $selectAll,
						'search' => $search
					]);

			}else if((!empty($_POST['info'])) && (empty($_POST['date']))){

				$sdt = trim($_POST['info']);
				$info = substr($sdt, 1);

				$search = $this->searchMulCon('don_dat_hang','SoDienThoai','',$info,'');

				$selectAll = $this->selectAll('don_dat_hang');

				$pagiOrders = $this->paginationOrder('don_dat_hang',$page,5);

				$selectOrders = $this->selectOrder('don_dat_hang',5);

				return compacts("admin/content/order/index",	
					[ 	
						'pagiOrders' => $pagiOrders,
						'selectOrders' => $selectOrders,
						'selectAll' => $selectAll,
						'search' => $search
					]);

			}else{

				$search = $this->searchMulCon('don_dat_hang','','Created_time','',trim($_POST['date']));

				$selectAll = $this->selectAll('don_dat_hang');

				$pagiOrders = $this->paginationOrder('don_dat_hang',$page,5);

				$selectOrders = $this->selectOrder('don_dat_hang',5);

				return compacts("admin/content/order/index",	
					[ 	
						'pagiOrders' => $pagiOrders,
						'selectOrders' => $selectOrders,
						'selectAll' => $selectAll,
						'search' => $search
					]);

			}

			

			// $selectAll = $this->selectAll('don_dat_hang');

			// $pagiOrders = $this->paginationOrder('don_dat_hang',$page,5);

			// $selectOrders = $this->selectOrder('don_dat_hang',5);

			// return compacts("admin/content/order/index",	
			// 	[ 	
			// 		'pagiOrders' => $pagiOrders,
			// 		'selectOrders' => $selectOrders,
			// 		'selectAll' => $selectAll 
			// 	]);

		}
 
		$selectAll = $this->selectAll('don_dat_hang');

		$pagiOrders = $this->paginationOrder('don_dat_hang',$page,5);

		$selectOrders = $this->selectOrder('don_dat_hang',5);

		return compacts("admin/content/order/index",	
			[ 	
				'pagiOrders' => $pagiOrders,
				'selectOrders' => $selectOrders,
				'selectAll' => $selectAll 
			]);


		}
	}
?>