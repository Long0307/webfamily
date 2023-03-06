<?php

require_once("../../Model/admin/RedirectModel.php");
$error = array();
$success = array();
class RedirectController extends RedirectModel
{
	public function logo(){

		if(isset($_POST['save'])){

			if(empty($_FILES['image']['name'])){
					
					$error['image'] = "<p class='text-danger'>Bạn chưa thay ảnh</p>";

					$selectOne = $this->selectOne('thong_tin_web','id',1);

					return compacts("admin/content/redirect/logo",[ 'error' => $error,'selectOne' => $selectOne ]);

			}else{

				$file_name = trim($_FILES['image']['name']);
				$file_size = $_FILES['image']['size'];
				$file_tmp = $_FILES['image']['tmp_name'];

				move_uploaded_file($file_tmp,"../../uploads/".$file_name);

				$keysp = "logo = '".$file_name."'";

				$updateUser = $this->update('thong_tin_web',$keysp,'id',1);

				$selectOne = $this->selectOne('thong_tin_web','id',1);

				return compacts("admin/content/redirect/logo",[ 'selectOne' => $selectOne ]);
			}

		}else{
			$selectOne = $this->selectOne('thong_tin_web','id',1);

			return compacts("admin/content/redirect/logo",[ 'selectOne' => $selectOne ]);
		}

	}

	public function favicon(){

		if(isset($_POST['save_favicon_customer'])){

			if(empty($_FILES['image']['name'])){
					
					$error['image'] = "<p class='text-danger'>Bạn chưa thay favicon phía trang webshop</p>";

					$selectOne = $this->selectOne('thong_tin_web','id',1);

					return compacts("admin/content/redirect/favicon",[ 'error' => $error,'selectOne' => $selectOne ]);

			}else{

				$selectOne = $this->selectOne('thong_tin_web','id',1);

				$link = "../../View/customer/inc/".$selectOne[0]['favicon_customer'];
				$link2 = "../../View/admin/content/order/".$selectOne[0]['favicon_customer'];

				if(file_exists($link) && file_exists($link2)){
					if(unlink($link) && unlink($link2)){
						
						$file_name = trim($_FILES['image']['name']);

						$file_name = explode(".",$file_name);

						$file_name = $file_name[0]."."."png";

						$file_size = $_FILES['image']['size'];
						$file_tmp = $_FILES['image']['tmp_name'];

						move_uploaded_file($file_tmp,"../../View/customer/inc/".$file_name);
						move_uploaded_file($file_tmp,"../../View/admin/content/order/".$file_name);

						$keysp = "favicon_customer = '".$file_name."'";

						$updateUser = $this->update('thong_tin_web',$keysp,'id',1);

						$selectOne = $this->selectOne('thong_tin_web','id',1);

						return compacts("admin/content/redirect/favicon",[ 'selectOne' => $selectOne ]);

					}else{
						$error['image'] = "<p class='text-danger'>Gặp lỗi trong quá trình sửa ảnh</p>";
					}
				}
			}

		}else if(isset($_POST['save_favicon_admin'])){

			if(empty($_FILES['image']['name'])){
					
					$error['image'] = "<p class='text-danger'>Bạn chưa thay favicon phía trang quản trị</p>";

					$selectOne = $this->selectOne('thong_tin_web','id',1);

					return compacts("admin/content/redirect/favicon",[ 'error' => $error,'selectOne' => $selectOne ]);

			}else{


				$selectOne = $this->selectOne('thong_tin_web','id',1);

				$link = "../../View/admin/inc/".$selectOne[0]['favicon_admin_page'];

				if(file_exists($link)){
					if(unlink($link)){
						
						$file_name = trim($_FILES['image']['name']);

						$file_name = explode(".",$file_name);

						$file_name = $file_name[0]."."."png";

						$file_size = $_FILES['image']['size'];
						$file_tmp = $_FILES['image']['tmp_name'];

						move_uploaded_file($file_tmp,"../../View/admin/inc/".$file_name);

						$keysp = "favicon_admin_page = '".$file_name."'";

						$updateUser = $this->update('thong_tin_web',$keysp,'id',1);

						$selectOne = $this->selectOne('thong_tin_web','id',1);

						return compacts("admin/content/redirect/favicon",[ 'selectOne' => $selectOne ]);

					}else{
						$error['image'] = "<p class='text-danger'>Gặp lỗi trong quá trình sửa ảnh</p>";
					}
				}
			}

		}else{

			$selectOne = $this->selectOne('thong_tin_web','id',1);

			return compacts("admin/content/redirect/favicon",[ 'selectOne' => $selectOne ]);

		}

	}

	public function showmenu($i = 1){
		// $news = new RedirectController;
		$showwEdit = $this->selectOne('mega_menu','id',$i);
		$arrItem = "";
		// print_r($showwEdit);
		foreach($showwEdit as $items){	

				if($items['parent_id'] == 0){
					$arrItem .= '<div class="panel-heading">
							<h6 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#block-page" aria-expanded="true" class="collapsed">'.$items['ten'].'</a>
							</h6>
						</div>';
					// ---------------------------
				} 
				else if($items['position'] >= 1){
					$arrItem .= '<div class="p-3" style="position:relative;">
					<div class="cover border p-3">
						<div class="form-check p-0">
							<input class="form-check-input" type="checkbox" disabled value="'.$items['ten'].'" id="flexCheckDefault'."_".$i.'">
							<label class="form-check-label" for="flexCheckDefault'."_".$i.'">
							'.$items['ten'].'
							</label>
						</div>
					</div>
				</div>';
				}
				else if ($items['parent_id'] >= 1){
					$arrItem .= '<div class="p-3" style="position:relative;">
						<div class="cover border p-3">
							<div class="form-check p-0">
								<input class="form-check-input" type="checkbox" value="'.$items['ten'].'" id="flexCheckDefault'."_".$i.'">
								<label class="form-check-label" for="flexCheckDefault'."_".$i.'">
								'.$items['ten'].'
								</label>
								<a class="add-to-menu btn btn-primary float-end my-2" style="position:absolute; right:0;">Add to Menu</a>
							</div>
						</div>
					</div>';
				} 	
				$i++;	
				$arrItem .= RedirectController::showmenu($i);
				
		}

		return $arrItem;

	}

	public $arrcheck = [];
	public function showmenuright(){

		$showwEdit = $this->selectAll('mega_menu');
		$arrItem = "";

		
		foreach($showwEdit as $items){	
			
			$this->arrcheck[] = $items['position'];

					if($items['position'] == 1){
						$arrItem .= '
						<li class="dd-item">
							<div class="dd-handle">
								<div class="bar">
									<span class="title">'.$items['ten'].'</span>
								</div>
							</div>
							<div class="info border rounded hide">
								<p class="input-item">
									<span class="type">Type infomation</span></p>
								<p class="input-item"><label>Title </label></p>
								<div class="input-group my-0">
									<div class="input-group">
										<input type="text" class="form-control border" name="title[][1]" value="Chính sách mua hàng" aria-label="Amount (to the nearest dollar)">
										<span class="input-group-text"><img src="https://demo.website500k.com/proins/quantri/view/image/flags/vn.png"></span>
									</div>
								</div>  
								<div class="input-group my-0">
									<div class="input-group">
										<input type="text" class="form-control border" name="title[][2]" value="Chính sách mua hàng" aria-label="Amount (to the nearest dollar)">
										<span class="input-group-text"><img src="https://demo.website500k.com/proins/quantri/view/image/flags/gb.png"></span>
									</div>
								</div>
								<p class="input-item">
									<a href="javascript:void(0);" class="remove" onclick="remove_item(this);"> <i class="fa fa-trash"></i> Remove</a>
								</p>
							</div><a href="javascript:void(0);" class="explane" onclick="explane(this)">Explane</a>';

						}else if ($items['position'] > 1){
							$arrItem .= '<ol class="dd-list">
							<li class="dd-item">
							<div class="dd-handle">
								<div class="bar">
									<span class="title">'.$items['ten'].'</span>
								</div>
							</div>
							<div class="info border rounded hide">
								<p class="input-item">
									<span class="type">Type infomation</span></p>
								<p class="input-item"><label>Title </label></p>
								<div class="input-group my-0">
									<div class="input-group">
										<input type="text" class="form-control border" name="title[][1]" value="Chính sách mua hàng" aria-label="Amount (to the nearest dollar)">
										<span class="input-group-text"><img src="https://demo.website500k.com/proins/quantri/view/image/flags/vn.png"></span>
									</div>
								</div>
								<div class="input-group my-0">
									<div class="input-group">
										<input type="text" class="form-control border" name="title[][2]" value="Chính sách mua hàng" aria-label="Amount (to the nearest dollar)">
										<span class="input-group-text"><img src="https://demo.website500k.com/proins/quantri/view/image/flags/gb.png"></span>
									</div>
								</div>
								<p class="input-item">
									<a href="javascript:void(0);" class="remove" onclick="remove_item(this);"> <i class="fa fa-trash"></i> Remove</a>
								</p>
							</div><a href="javascript:void(0);" class="explane" onclick="explane(this)">Explane</a>
						</li></ol>';
						// </li>';
						} 
						
					}
				// }	

		// print_r($this->arrcheck);

		// foreach($this->arrcheck as $itemschecks){
		// 	if($this->arrcheck[$itemschecks + 1] >= $this->arrcheck[$itemschecks]){
		// 		echo $this->arrcheck[$itemschecks];
		// 	}
		// }

		// echo "arrCheck";

		return $arrItem;

	}

	public function megamenu(){

		$news = RedirectController::showmenu(1);

		$right = RedirectController::showmenuright();
		
		return compacts("admin/content/redirect/megamenu",	
		[ 	
			'news' => $news,
			'right' => $right,
		]);

	}

	public function informationdirectory($page = 0, $per = 0){

		if($page == "" || $page == 1){
			$page = 0;
		}else{
			$page = ($page*$per) - $per;
		}
	

		if(isset($_POST['search'])){

			$osearch = trim($_POST['textsearch']);

			$search = $this->search('danh_muc_thong_tin','TieuDe',$osearch);

			$selectAll = $this->selectAll('danh_muc_thong_tin');

			$pagiinfodirect = $this->paginationCom('danh_muc_thong_tin',$page,5);

			$selectinfodirect = $this->selectCom('danh_muc_thong_tin',5);

			return compacts("admin/content/redirect/infodirect/index",	
				[ 	
					'pagiinfodirect' => $pagiinfodirect,
					'selectinfodirect' => $selectNew,
					'selectAll' => $selectAll,
					'search'  => $search
				]);

		}else{

			$selectAll = $this->selectAll('danh_muc_thong_tin');

			$pagiinfodirect = $this->paginationCom('danh_muc_thong_tin',$page,$per);
	
			$selectinfodirect = $this->selectCom('danh_muc_thong_tin',$per);

			return compacts("admin/content/redirect/infodirect/index",	
			[ 	
				'selectAll' => $selectAll,
				'pagiinfodirect' => $pagiinfodirect,
				'selectinfodirect' => $selectinfodirect 
			]);
		}
	}

	public function deleteinfoderect(){
		$id = $_GET['id'];
		$delete = $this->delete('danh_muc_thong_tin','id',$id);
		if($delete){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

	public function getAdd(){
		if(isset($_POST['saveinfo'])){

			if(!empty($_POST['title'])){
				$title = trim($_POST['title']);
			}else{
				echo $error["err_title"] = "<p style='color:red;'>Tiêu đề của thông tin phải lớn hơn 3 và nhỏ hơn 64 ký tự!</p>";
			}

			if(!empty($_POST['meta_tag_title'])){
				$meta_tag_title = trim($_POST['meta_tag_title']);
			}else{
				echo $error["err_meta_tag_title"] = "<p style='color:red;'>Meta Tag Title phải từ 3 đến 255 ký tự!</p>";
			}

			if(!empty($_POST['content'])){
				$content = trim($_POST['content']);
			}else{
				echo $error["err_content"] = "<p style='color:red;'>Mô tả phải lớn hơn 3 ký tự!</p>";
			}

			if(!empty($_POST['meta_tag_desc'])){
				$meta_tag_desc = trim($_POST['meta_tag_desc']);
			}else{
				$meta_tag_desc = "";
			}

			if(!empty($_POST['meta_tag_keywords'])){
				$meta_tag_keywords = trim($_POST['meta_tag_keywords']);
			}else{
				$meta_tag_keywords = "";
			}

			if(!empty($_POST['showfooter'])){
				$showfooter = trim($_POST['showfooter']);
			}else{
				$showfooter = "";
			}

			if(!empty($_POST['status'])){
				$status = trim($_POST['status']);
			}else{
				$status = "";
			}

			if(!empty($_POST['number'])){
				$number = trim($_POST['number']);
			}else{
				$number = "";
			}

			if(isset($error)){

				return compacts("admin/content/redirect/infodirect/add",[ 'error' => $error ]);

			}else{

				$key = "TieuDe,MoTa,TieuDeMeta,MoTaMeta,TuKhoaMeta,HienThiCuoiTrang,status,ThuTu";

				$value = "('".$title."'".","."'".$content."'".","."'".$meta_tag_title."'".","."'".$meta_tag_desc."'".","."'".$meta_tag_keywords."'".","."'".$showfooter."'".","."'".$status."'".","."'".$number."')";
		
				$result = $this->insert('danh_muc_thong_tin',$key,$value);

				return redirect('../informationdirectory/');

			}

		}else{
			return views("admin/content/redirect/infodirect/add");
		}
	}

	public function edit(){

		$id = $_GET['id'];

		$name = $_GET['name'].".html";

		if(isset($_POST['updateinfo'])){

			if(!empty($_POST['title'])){
				$title = trim($_POST['title']);
			}else{
				echo $error["err_title"] = "<p style='color:red;'>Tiêu đề của thông tin phải lớn hơn 3 và nhỏ hơn 64 ký tự!</p>";
			}

			if(!empty($_POST['meta_tag_title'])){
				$meta_tag_title = trim($_POST['meta_tag_title']);
			}else{
				echo $error["err_meta_tag_title"] = "<p style='color:red;'>Meta Tag Title phải từ 3 đến 255 ký tự!</p>";
			}

			if(!empty($_POST['content'])){
				echo $content = trim($_POST['content']);
			}else{
				echo $error["err_content"] = "<p style='color:red;'>Mô tả phải lớn hơn 3 ký tự!</p>";
			}

			if(!empty($_POST['meta_tag_desc'])){
				$meta_tag_desc = trim($_POST['meta_tag_desc']);
			}else{
				$meta_tag_desc = "";
			}

			if(!empty($_POST['meta_tag_keywords'])){
				$meta_tag_keywords = trim($_POST['meta_tag_keywords']);
			}else{
				$meta_tag_keywords = "";
			}

			if(!empty($_POST['showfooter'])){
				$showfooter = trim($_POST['showfooter']);
			}else{
				$showfooter = "";
			}

			if(!empty($_POST['status'])){
				$status = trim($_POST['status']);
			}else{
				$status = "";
			}

			if(!empty($_POST['number'])){
				$number = trim($_POST['number']);
			}else{
				$number = "";
			}

			if(isset($error)){

				header('Location: ' . $_SERVER['HTTP_REFERER']);

			}else{

				$keysp = "TieuDe = '".$title."',MoTa = '".$content."',TieuDeMeta = '".$meta_tag_title."',MoTaMeta = '".$meta_tag_desc."'
				,TuKhoaMeta = '".$meta_tag_keywords."',HienThiCuoiTrang = '".$showfooter."',status = '".$status."'
				,ThuTU = '".$number."'";

				$updateinoforedirect = $this->update('danh_muc_thong_tin',$keysp,'id',$id);

				$success['updatesuc'] = "<p style='color:green'>Sửa thành công</p>";
	
				return redirect('../');

			}
		}

		$showwEdit = $this->selectOne('danh_muc_thong_tin','id',$id);

		return compacts("admin/content/redirect/infodirect/edit",	
		[ 	
			'showwEdit' => $showwEdit,
		]);

	}
}