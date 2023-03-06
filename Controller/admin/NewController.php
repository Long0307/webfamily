<?php

require_once("../../Model/admin/NewModel.php");
$error = array();

class NewController extends NewModel
{

	public function pagination($page = 0){

		if($page == "" || $page == 1){
			$page = 0;
		}else{
			$page = ($page*5)-5;
		}

		if(isset($_GET['action'])){

			$action = $_GET['action'];

			if($action == "edit"){

				$id = $_GET['id'];

				if(isset($_POST['update'])){

					$file_name = trim($_FILES['hinhanh']['name']);
					$file_size = $_FILES['hinhanh']['size'];
					$file_tmp = $_FILES['hinhanh']['tmp_name'];

					move_uploaded_file($file_tmp,"../../ImageNew/".$file_name);

					$title = trim($_POST['title']);

					$intro = trim($_POST['intro']);

					$content = $_POST['content'];

					if(!empty($file_name)){

						$keysp = "HinhAnh = '".$file_name."',TieuDe = '".$title."',MoTaNgan = '".$intro."',NoiDung = '".$content."'";

						$updateNews = $this->update('bai_viet',$keysp,'ID',$id);

						$success['updatesuc'] = "<p style='color:green'>Sửa thành công</p>";

						$showwEdit = $this->selectOne('bai_viet','ID',$id);

						return compacts("admin/content/new/edit",	
						[ 	
							'showwEdit' => $showwEdit,
							'success' => $success['updatesuc']
						]);

					}else{

						$selectOne = $this->selectOne('bai_viet','ID',$id);

						$hinhanh = $selectOne[0]['HinhAnh'];

						$keysp = "HinhAnh = '".$hinhanh."',TieuDe = '".$title."',MoTaNgan = '".$intro."',NoiDung = '".$content."'";

						$updateNews = $this->update('bai_viet',$keysp,'ID',$id);

						$success['updatesuc'] = "<p style='color:green'>Sửa thành công</p>";

						$showwEdit = $this->selectOne('bai_viet','ID',$id);

						return compacts("admin/content/new/edit",	
						[ 	
							'showwEdit' => $showwEdit,
							'success' => $success['updatesuc']
						]);
						
					}

				}

				$showwEdit = $this->selectOne('bai_viet','ID',$id);

				return compacts("admin/content/new/edit",	
				[ 	
					'showwEdit' => $showwEdit,
				]);

			}else if($action == "delete"){

				$id = $_GET['id'];

				$delete = $this->delete('bai_viet','ID',$id);

				$success['deletesuc'] = "<p style='color:green'>Xoá thành công</p>";

				$selectAll = $this->selectAll('bai_viet');

				$pagiNew = $this->paginationNew('bai_viet',$page,5);

				$selectNew = $this->selectNew('bai_viet',5);

				return compacts("admin/content/new/index",	
				[ 	
					'pagiNew' => $pagiNew,
					'selectNew' => $selectNew,
					'selectAll' => $selectAll,
					'success' => $success['deletesuc']
				]);

			}

		}

		if(isset($_POST['search'])){

			$osearch = trim($_POST['textsearch']);

			$search = $this->search('bai_viet','TieuDe',$osearch);

			$selectAll = $this->selectAll('bai_viet');

			$pagiNew = $this->paginationNew('bai_viet',$page,5);

			$selectNew = $this->selectNew('bai_viet',5);

			return compacts("admin/content/new/index",	
				[ 	
					'pagiNew' => $pagiNew,
					'selectNew' => $selectNew,
					'selectAll' => $selectAll,
					'search'  => $search
				]);

		}

		$selectAll = $this->selectAll('bai_viet');

		$pagiNew = $this->paginationNew('bai_viet',$page,5);

		$selectNew = $this->selectNew('bai_viet',5);

		return compacts("admin/content/new/index",	
			[ 	
				'pagiNew' => $pagiNew,
				'selectNew' => $selectNew,
				'selectAll' => $selectAll 
			]);


	}

	public function getAdd(){

		if(isset($_POST['addnews'])){

			if(empty($_FILES['hinhanh']['name'])){

				$error['nullhinhanh'] = "<p style='color:red;'><p style='color:red;'>Không được để trống ảnh bài viết<p>";

			}else{

				$file_name = trim($_FILES['hinhanh']['name']);
				$file_size = $_FILES['hinhanh']['size'];
				$file_tmp = $_FILES['hinhanh']['tmp_name'];

				move_uploaded_file($file_tmp,"../../public/logo/".$file_name);

			}

			if(empty($_POST['title'])){

				$error['nulltitle'] = "<p style='color:red;'><p style='color:red;'>Không được để trống tiêu đề bài viết<p>";

			}else{

				$title = trim($_POST['title']);

			}

			if(empty($_POST['intro'])){

				$error['nullintro'] = "<p style='color:red;'><p style='color:red;'>Không được để trống tiêu đề bài viết<p>";

			}else{

				$intro = trim($_POST['intro']);

			}

			if(empty($_POST['content'])){

				$error['nullcontent'] = "<p style='color:red;'><p style='color:red;'>Không được để trống tiêu đề bài viết<p>";

			}else{

				$content = $_POST['content'];

			}

			if(!empty($_POST['title']) 
				&& !empty($_POST['intro']) 
				&& !empty($_FILES['hinhanh']['name']) 
				&& !empty($_POST['content'])){

			$key = "HinhAnh,TieuDe,MoTaNgan,NoiDung";

			$value = "('".$file_name."'".","."'".$title."'".","."'".$intro."'".","."'".$content."')";
			
			$result = $this->insert('bai_viet',$key,$value);

			if($result){	

				$success['success'] = "<p style='color:green;'>Thêm bài viết thành công</p>";

				return compacts("admin/content/new/add",[ 'success' => $success ]);
			}

		}else{

			

			return compacts("admin/content/new/add",[ 'error' => $error ]);

		}

	}

	return views("admin/content/new/add");
}
}
?>