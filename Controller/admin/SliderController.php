<?php

require_once("../../Model/admin/sliderModel.php");
$error = array();
$success = array();
class SliderController extends sliderModel
{
	

	public function pagination($page = 0){

		if($page == "" || $page == 1){
			$page = 0;
		}else{
			$page = ($page*5)-5;
		}

		$action = "";

		if(isset($_GET['action'])){

			$action = $_GET['action'];

			if($action = "delete"){

				$id = $_GET['id'];

				$delete = $this->delete('slider','id',$id);

			}
		}

		
 
		$selectAll = $this->selectAll('slider');

		$pagislider = $this->paginationslider('slider',$page,5);

		$selectslider = $this->selectslider('slider',5);

		return compacts("admin/content/slider/index",	
			[ 	
				'pagislider' => $pagislider,
				'selectslider' => $selectslider,
				'selectAll' => $selectAll 
			]);


	}

	public function edit(){
		$id = $_GET['id'];

		

		$showwEdit = $this->selectOne('slider','id',$id);

		return compacts("admin/content/slider/edit",	
		[ 	
			'showwEdit' => $showwEdit,
		]);
	}

	public function updated(){

			$id = $_GET['id'];

			if(empty($_POST['name'])){

				$error["err_name"] = "<p style='color:red;'>Không được để trống tên slide</p>";

				return compacts("admin/content/slider/edit" ,
					[ 	
						'err_name' => $error["err_name"],
					]);

			}else{

				$name = trim($_POST['name']);

			}

			if(empty($_POST['show'])){

				$show = 0;

			}else{

				$show = 1;

			}

			if(empty($_POST['content'])){

				$error["err_content"] = "<p style='color:red;'>Không được để trống mô tả quảng cáo</p>";

				return compacts("admin/content/slider/edit" ,
					[ 	
						'err_content' => $error["err_content"],
					]);

			}else{

				$content = trim($_POST['content']);

			}


			if(empty($_FILES['image']['name'])){

				

				$keysp = "ten = '".$name."',description = '".$content."',status = '".$show."'";

				$result = $this->update('slider',$keysp,'id',$id);
	
				echo $success['success'] = "<p style='color:green;'> Sửa thành công </p>"; 				

				$showwEdit = $this->selectOne('slider','id',$id);

				return compacts("admin/content/slider/edit",	
				[ 	
					'showwEdit' => $showwEdit,
					'success' => $success
				]);

			}else{

				$file_name = trim($_FILES['image']['name']);
				$file_size = $_FILES['image']['size'];
				$file_tmp = $_FILES['image']['tmp_name'];

				move_uploaded_file($file_tmp,"../../uploads/".$file_name);

				

				$keysp = "ten = '".$name."',description = '".$content."',status = '".$show."',image = '".$file_name."'";

				$result = $this->update('slider',$keysp,'id',$id);

				if($result){
					$success = "<p style='color:green;'> Sửa thành công </p>"; 
				}

				
				$showwEdit = $this->selectOne('slider','id',$id);

				return compacts("admin/content/slider/edit",	
				[ 	
					'showwEdit' => $showwEdit,
					'success' => $success
				]);

			}
	}

	public function getAdd(){

		if(isset($_POST['add'])){	

			if(empty($_POST['name'])){

				$error["err_name"] = "<p style='color:red;'>Không được để trống tên slide</p>";

				return compacts("admin/content/slider/add" ,
					[ 	
						'err_name' => $error["err_name"],
					]);

			}else{

				$name = trim($_POST['name']);

			}

			if(empty($_FILES['image']['name'])){

				$error["err_image"] = "<p style='color:red;'>Không được để trống ảnh quảng cáo</p>";

				return compacts("admin/content/slider/add" ,
					[ 	
						'err_image' => $error["err_image"],
					]);

			}else{

				$file_name = trim($_FILES['image']['name']);
				$file_size = $_FILES['image']['size'];
				$file_tmp = $_FILES['image']['tmp_name'];

				move_uploaded_file($file_tmp,"../../uploads/".$file_name);

			}

			if(empty($_POST['show'])){

				$show = 0;

			}else{

				$show = 1;

			}

			if(empty($_POST['maintitle'])){

				$error["err_maintitle"] = "<p style='color:red;'>Không được để trống tiêu đề chính</p>";

				return compacts("admin/content/slider/add" ,
					[ 	
						'err_maintitle' => $error["err_maintitle"],
					]);

			}else{

				$maintitle = trim($_POST['maintitle']);

			}

			if(empty($_POST['subtitle'])){

				$subtitle = "";

			}else{

				$subtitle = trim($_POST['subtitle']);

			}


			$style = trim($_POST['slidestyle'][0]);


			if(empty($_POST['link'])){

				$error["err_link"] = "<p style='color:red;'>Không được để trống link trang</p>";

				return compacts("admin/content/slider/add" ,
					[ 	
						'err_link' => $error["err_link"],
					]);

			}else{

				$link = trim($_POST['link']);

			}

			if(empty($_POST['content'])){

				$error["err_content"] = "<p style='color:red;'>Không được để trống mô tả quảng cáo</p>";

				return compacts("admin/content/slider/add" ,
					[ 	
						'err_content' => $error["err_content"],
					]);

			}else{

				$content = trim($_POST['content']);

			}

			$key = "ten,description,TieuDeChinh,TieuDePhu,link,style,status,image";

			$value = "('".$name."'".","."'".$content."'".","."'".$maintitle."'".","."'".$subtitle."'".","."'".$link."'".","."'".$style."'".","."'".$show."'".","."'".$file_name."')";

			
			
			$result = $this->insert('slider',$key,$value);

			if($result){
				$success['success'] = "<p style='color:green;'> Thêm thành công </p>"; 
			}

			return compacts("admin/content/slider/add" ,
				[ 
					'success' => $success
				]);

		}

		return views("admin/content/slider/add");


	}

}


?>