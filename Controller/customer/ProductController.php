<?php
require_once("Model/customer/ProductModel.php");

class ProductController extends ProductModel
{

	public function pagination($page = 0){

		if(isset($_POST['search-header'])){
			$ProductModel = new ProductModel;

			$keyword = trim($_POST['text-search-header']);

			$searchCate = $ProductModel->searchCate($keyword);	

			if(empty($searchCate)){	

				$searchPro = $ProductModel->searchPro($keyword);

				if(empty($searchPro)){

					$searchNew = $ProductModel->searchNew($keyword);

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

		if(isset($_GET['idsp']) && isset($_GET['idlsp'])){

			$idsp = $_GET['idsp'];

			$idlsp = $_GET['idlsp'];

			$ProductModel = new ProductModel;

			$selectAll = $ProductModel->selectAll('danh_muc_san_pham');

			$productDetail = $ProductModel->selectJoin2WithId('san_pham','IDDanhMuc','danh_muc_san_pham','ID','ID',$idsp);

			$proSoldSame = $ProductModel->proSoldSame("san_pham","IDDanhMuc",$idlsp);

			$selectAllCOm = $ProductModel->selectJoin2Where('binh_luan','id_san_pham','san_pham','ID','status','1','id',$idsp);

			$selectOne = $ProductModel->selectOne('thong_tin_web','id',1);

			return compacts("customer/content/productDetail",
			[ 
				'productDetail' => $productDetail,
				'proSoldSame' => $proSoldSame , 
				'selectAll' => $selectAll,
				'selectAllCOm' => $selectAllCOm,
				'selectOne' => $selectOne
			]);

		}else if(isset($_GET['idlsp'])){

			if($page == "" || $page == 1){
				$page = 0;
			}else{
				$page = ($page*12)-12;
			}

			$ProductModel = new ProductModel;

			$idlsp = $_GET['idlsp'];

			$proSoldSame = $ProductModel->proSoldSame("san_pham","IDDanhMuc",$idlsp);

			$pagiProSameCate = $ProductModel->paginationProductSameCate('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$idlsp,$page,12);

			$selectProductSameCate = $ProductModel->selectProductSameCate('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$idlsp,12);

			$selectAllProductSameCate = $ProductModel->selectJoin2SameCate('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$idlsp);

			$selectAll = $ProductModel->selectAll('danh_muc_san_pham');

			$selectOne = $ProductModel->selectOne('danh_muc_san_pham','ID',$idlsp);

			$prTop = $ProductModel->prTop('san_pham','SoLuongDaBan');

			$proSoldSame = $ProductModel->countSamePro("san_pham","IDDanhMuc",$idlsp);

			$selectOneInfo = $ProductModel->selectOne('thong_tin_web','id',1);
			
			return compacts("customer/content/shop",[ 
				'selectAll' => $selectAll,
				'pagiProSameCate' => $pagiProSameCate, 
				'selectProductSameCate' => $selectProductSameCate, 
				'selectAllProductSameCate' => $selectAllProductSameCate,
				'proSoldSame' => $proSoldSame,
				'selectOne' => $selectOne,
				'prTop' => $prTop,
				'proSoldSame' => $proSoldSame,
				'selectOneInfo' => $selectOneInfo
			]);


		}else{

			if($page == "" || $page == 1){
				$page = 0;
			}else{
				$page = ($page*12)-12;
			}			$ProductModel = new ProductModel;

			$pagiPro = $ProductModel->paginationProduct('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$page,12);

			$selectProduct = $ProductModel->selectProduct('san_pham','IDDanhMuc','danh_muc_san_pham','ID',12);

			$selectAllProduct = $ProductModel->selectJoin2('san_pham','IDDanhMuc','danh_muc_san_pham','ID');

			$selectAll = $ProductModel->selectAll('danh_muc_san_pham');

			$prTop = $ProductModel->prTop('san_pham','SoLuongDaBan');
			
			$proSoldSame = $ProductModel->countSamePro("san_pham","IDDanhMuc",0);

			$selectOneInfo = $ProductModel->selectOne('thong_tin_web','id',1);

			return compacts("customer/content/shop",[ 
				'selectAll' => $selectAll,
				'pagiPro' => $pagiPro, 
				'selectProduct' => $selectProduct, 
				'selectAllProduct' => $selectAllProduct,
				'prTop' => $prTop,
				'proSoldSame' => $proSoldSame,
				'selectOneInfo' => $selectOneInfo
			]);

		}

	}
}


?>