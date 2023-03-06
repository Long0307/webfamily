<?php

require_once("../../Model/admin/CategoryModel.php");
$error = array();
$success = array();
class CategoryController extends CategoryModel
{

	public function pagination($page = 0){

		if(isset($_POST['add'])){	

			if(empty($_POST['theloai'])){

				$error["err_theloai"] = "<p style='color:red;'>Không được để trống thể loại sản phẩm</p>";

				$selectAll = $this->selectAll('danh_muc_san_pham');

				$pagiCate = $this->paginationCate('danh_muc_san_pham',$page,5);

				$selectCate = $this->selectCate('danh_muc_san_pham',5);

				return compacts("admin/content/category/index" ,
					[ 	
						'pagiCate' => $pagiCate,
						'selectCate' => $selectCate,
						'selectAll' => $selectAll,
						'err_theloai' => $error["err_theloai"]
					]);

			}else{

				$theloai = trim($_POST['theloai']);

				$key = "TenDanhMuc";

				$value = "('".$theloai."')";
				
				$result = $this->insert('danh_muc_san_pham',$key,$value);

				if($result){
					$success['success'] = "<p style='color:green;'> Thêm thành công </p>"; 
				}
	 
				$selectAll = $this->selectAll('danh_muc_san_pham');

				$pagiCate = $this->paginationCate('danh_muc_san_pham',$page,5);

				$selectCate = $this->selectCate('danh_muc_san_pham',5);

				return compacts("admin/content/category/index",	
					[ 	
						'pagiCate' => $pagiCate,
						'selectCate' => $selectCate,
						'selectAll' => $selectAll,
						'success' => $success
					]);

				}

		}

		if($page == "" || $page == 1){
			$page = 0;
		}else{
			$page = ($page*5)-5;
		}

		$action = "";

		if(isset($_GET['action'])){

			$action = $_GET['action'];

			if($action == "delete"){

				$id = $_GET['id'];

				$delete = $this->delete('danh_muc_san_pham','ID',$id);
 
				header("location:../../admin/category/");

			}else if($action == "check"){

				$id = $_GET['id'];

				$number = $this->selectOne('san_pham','IDDanhMuc',$id);

				echo "Đây là count number: ".count($number);

				die();

			}else if($action == "updatenew"){

				$id = $_GET['id'];

				$nameupdate = $_GET['nameupdate'];

				$keysp = "TenDanhMuc = '".$nameupdate."'";

				$this->update('danh_muc_san_pham',$keysp,'ID',$id);

			}else{

				$selectAll = $this->selectAll('danh_muc_san_pham');

				$pagiCate = $this->paginationCate('danh_muc_san_pham',$page,5);
		
				$selectCate = $this->selectCate('danh_muc_san_pham',5);
		
				return compacts("admin/content/category/index",	
					[ 	
						'pagiCate' => $pagiCate,
						'selectCate' => $selectCate,
						'selectAll' => $selectAll 
					]);
				
			}
	
 
		$selectAll = $this->selectAll('danh_muc_san_pham');

		$pagiCate = $this->paginationCate('danh_muc_san_pham',$page,5);

		$selectCate = $this->selectCate('danh_muc_san_pham',5);

		return compacts("admin/content/category/index",	
			[ 	
				'pagiCate' => $pagiCate,
				'selectCate' => $selectCate,
				'selectAll' => $selectAll 
			]);
		}

		 
		$selectAll = $this->selectAll('danh_muc_san_pham');

		$pagiCate = $this->paginationCate('danh_muc_san_pham',$page,5);

		$selectCate = $this->selectCate('danh_muc_san_pham',5);

		return compacts("admin/content/category/index",	
			[ 	
				'pagiCate' => $pagiCate,
				'selectCate' => $selectCate,
				'selectAll' => $selectAll 
			]);

	}

	public function getAdd(){

		if(isset($_POST['add'])){	

			if(empty($_POST['theloai'])){

				$error["err_theloai"] = "<p style='color:red;'>Không được để trống thể loại sản phẩm</p>";

				return compacts("admin/content/category/add" ,
					[ 	
						'err_theloai' => $error["err_theloai"],
					]);

			}else{

				$theloai = trim($_POST['theloai']);

			}

			$key = "TenDanhMuc";

			$value = "('".$theloai."')";
			
			$result = $this->insert('danh_muc_san_pham',$key,$value);

			if($result){
				$success['success'] = "<p style='color:green;'> Thêm thành công </p>"; 
			}

			return compacts("admin/content/category/add" ,
				[ 
					'success' => $success
				]);

		}

		return views("admin/content/category/add");


	}

}


?>