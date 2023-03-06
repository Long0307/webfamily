<?php
	
	// require_once("Controller.php");
	require_once("Model/customer/NewModel.php");

	class NewController extends NewModel
	{

		public function pagination($page = 0)
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

			if($page == "" || $page == 1){
				$page = 0;
			}else{
				$page = ($page*12)-12;
			}

			if(isset($_GET['idnew'])){

				$idnew = $_GET['idnew'];

				$selectOne = $this->selectOne('bai_viet','ID',$idnew);

				$selectNewsSort = $this->selectNewsSort('bai_viet','ID','DESC',12);

				$selectOneInfo = $this->selectOne('thong_tin_web','id',1);
				$selectAllCate = $this->selectAll('danh_muc_san_pham');

				return compacts("customer/content/newsDetail",
				[ 	
					'selectOne' => $selectOne,
					'selectNewsSort' => $selectNewsSort,
					'selectOneInfo' => $selectOneInfo,
					'selectAllCate' => $selectAllCate,
				]);
			}

			if(isset($_POST['search_blog'])){
				
				$keyword = $this->searchKey($_POST['text_search_blog']);

				$pagiNew = $this->paginationNew('bai_viet',$page,12);

				$selectNew = $this->selectNew('bai_viet',12);

				$selectAll = $this->selectAll('bai_viet');

				$selectAllCate = $this->selectAll('danh_muc_san_pham');

				$selectOneInfo = $HomeModel->selectOne('thong_tin_web','id',1);

				return compacts("customer/content/blog",
				[ 	
					'pagiNew' => $pagiNew,
					'selectNew' => $selectNew,
					'selectAll' => $selectAll,
					'keyword' => $keyword,
					'selectAllCate' => $selectAllCate,
					'selectOneInfo' => $selectOneInfo
				]);

			}

			$pagiNew = $this->paginationNew('bai_viet',$page,12);

			$selectNew = $this->selectNew('bai_viet',12);

			// $newsNew = $this->newsNew('bai_viet',8);

			$selectAll = $this->selectAll('bai_viet');

			$selectOneInfo = $this->selectOne('thong_tin_web','id',1);

			$selectAllCate = $this->selectAll('danh_muc_san_pham');

			return compacts("customer/content/blog",
			[ 	
				'pagiNew' => $pagiNew,
				'selectNew' => $selectNew,
				// 'newsNew' => $newsNew,
				'selectAll' => $selectAll,
				'selectAllCate' => $selectAllCate,
				'selectOneInfo' => $selectOneInfo
			]);

		}
	}

?>