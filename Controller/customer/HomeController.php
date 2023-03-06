<?php

// require_once("Controller.php");
require_once("Model/customer/HomeModel.php");

class HomeController extends HomeModel
{	
	public function header(){

		$selectAll = $this->selectAll('danh_muc_san_pham');

		$selectOne = $this->selectOne('thong_tin_web','id',1);

		return compacts("customer/inc/header",[ 'selectAll' => $selectAll,'selectOne' => $selectOne ]);
		
	}

	public function footer(){

		$selectOneInfo = $this->selectOne('thong_tin_web','id',1);

		return compacts("customer/inc/footer",[ 'selectOneInfo' => $selectOneInfo ]);
	}


	public function content()
	{	

		if(isset($_POST['search-header'])){

			$keyword = trim($_POST['text-search-header']);

			$searchCate = $this->searchCate($keyword);	

			if(empty($searchCate)){	

				$searchPro = $this->searchPro($keyword);

				if(empty($searchPro)){

					$searchNew = $this->searchNew($keyword);

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

		$selectOne = $this->selectOne('thong_tin_web','id',1);

		$selectAll = $this->selectAll('danh_muc_san_pham');

		$proSold = $this->proSold();

		$get3New = $this->get3New();

		$prTop = $this->prTop('san_pham','SoLuongDaBan');

		$getAllSlider = $this->selectAll('slider');
		
		return compacts("customer/content/content",[ 'selectAll' => $selectAll, 'get3New' => $get3New,'proSold' => $proSold,'prTop' => $prTop,'selectOne' => $selectOne,'getAllSlider' => $getAllSlider ]);

	}

	public function introduce()
	{
		if(isset($_POST['search-header'])){


			$keyword = trim($_POST['text-search-header']);

			$searchCate = $this->searchCate($keyword);	

			if(empty($searchCate)){	

				$searchPro = $this->searchPro($keyword);

				if(empty($searchPro)){

					$searchNew = $this->searchNew($keyword);

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


		$selectOne = $this->selectOne('thong_tin_web','id',1);

		$selectAll = $this->selectAll('danh_muc_san_pham');

		return compacts("customer/content/introduce",[ 'selectAll' => $selectAll,'selectOne' => $selectOne ]);
	}
}

;?>