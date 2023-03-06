<?php

// require_once("Controller.php");
require_once("Model/customer/HomeModel.php");

class CartController
{
	public static function cart()
	{
		$HomeModel = new HomeModel;

		if(isset($_POST['search-header'])){

			$keyword = trim($_POST['text-search-header']);

			$searchCate = $HomeModel->searchCate($keyword);	

			if(empty($searchCate)){	

				$searchPro = $HomeModel->searchPro($keyword);

				if(empty($searchPro)){

					$searchNew = $HomeModel->searchNew($keyword);

					if(empty($searchNew)){

						echo $error['null'] = "<p style='color:red;'>Xin lỗi! chúng tôi không thể đáp ứng yêu cầu với từ khoá này.</p>";

					}else{

						$idlsp = $searchNew[0]['ID'];

						header("location:index.php?controller=new&idnew=".$idlsp);	

					}

				}else{

					$idlsp = $searchPro[0]['IDDanhMuc'];
					
					$idsp = $searchPro[0]['ID'];

					header("location:index.php?controller=shop&idlsp=".$idlsp."&idsp=".$idsp);	

				}

			}else{

				$idlsp = $searchCate[0]['IDDanhMuc'];

				header("location:index.php?controller=shop&idlsp=".$idlsp);	

			}

		}
		$HomeModel = new HomeModel;

		$selectOne = $HomeModel->selectOne('thong_tin_web','id',1);

		$selectAll = $HomeModel->selectAll('danh_muc_san_pham');

		return compacts("customer/content/cart",[ 'selectAll' => $selectAll,'selectOne' => $selectOne ]);
	}
}

?>