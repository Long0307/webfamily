
<?php

require_once("../../Model/admin/ProductModel.php");
$error = array();
$success = array();
class ProductController extends ProductModel
{

	public function show(){

		$selectAllProduct = $this->selectJoin2('san_pham','IDDanhMuc','danh_muc_san_pham','ID');

		return compacts("admin/content/product/index",[ 'selectAllProduct' => $selectAllProduct ]);
	}

	public function getAdd(){

		if(isset($_POST['add'])){

			if(!empty($_POST['name'])){
				$name = $_POST['name'];

			}else{

				echo $error["err_name"] = "<p style='color:red;'>Không được để trống tên sản phẩm</p>";
			}

			if(!empty($_POST['cate'])){
				$cate = $_POST['cate'];
			}else{

				echo $error["err_cate"] = "<p style='color:red;'>Không được để trống danh mục sản phẩm</p>";

			}

			if(!empty($_FILES['image']['name'])){

				sleep(0.5);
				$image = $_FILES['image']['name'];

				$checkImage = checkImage($_FILES['image']);
			}else{

				echo $error["err_image"] = "<p style='color:red;'>Không được để trống ảnh sản phẩm</p>";

			}

			if(!empty($_POST['price'])){
				$price = $_POST['price'];
			}else{

				echo $error["err_price"] = "<p style='color:red;'>Không được để trống giá sản phẩm</p>";

			}

			if(!empty($_POST['year'])){
				$year = $_POST['year'];
			}else{

				echo $error["err_year"] = "<p style='color:red;'>Không được để trống năm xuất bản</p>";

			}

			if(!empty($_POST['material'])){
				$material = $_POST['material'];
			}else{
				echo $error["err_material"] = "<p style='color:red;'>Không được để trống chất liệu sản phẩm</p>";

			}

			if(!empty($_POST['origin'])){
				$origin = $_POST['origin'];
			}else{
				echo $error["err_origin"] = "<p style='color:red;'>Không được để trống xuất xứ sản phẩm</p>";

			}

			if(!empty($_POST['content'])){
				$content = $_POST['content'];
			}else{
				echo $error["err_content"] = "<p style='color:red;'>Không được để trống thông tin sản phẩm</p>";

			}


			if(!empty($_POST['code'])){

				$code = $_POST['code'];

			}else{



				$selectCate = $this->selectAll('san_pham');

				$check = count($selectCate);

				$after = $check + 1;

				// SP00000001

				if($check < 10){

					sleep(0.5);

					echo $code = "SP000000".(string)$after;
				}else if($check < 100){

					sleep(0.5);
					echo $code = "SP00000".(string)$after;
				}else if($check < 1000){

					sleep(0.5);
					echo $code = "SP0000".(string)$after;
				}else if($check < 100000){

					sleep(0.5);
					echo $code = "SP000".(string)$after;
				}else if($check < 1000000){

					sleep(0.5);
					echo $code = "SP00".(string)$after;
				}else if($check < 10000000){

					sleep(0.5);
					echo $code = "SP0".(string)$after;
				}else{

					sleep(0.5);
					echo $code = "SP".(string)$after;
				}
				

			}


			if(!empty($_POST['firstprice'])){
				$firstprice = $_POST['firstprice'];
			}else{
				$firstprice = "";

			}

			if(!empty($_POST['name']) 
				&& !empty($_POST['cate']) 
				&& !empty($_FILES['image']) 
				&& !empty($_POST['price']) 
				&& !empty($_POST['year']) 
				&& !empty($_POST['material']) 
				&& !empty($_POST['origin'])
				&& !empty($_POST['content'])){

				$key = "IDDanhMuc,Tensp,HinhAnhSP,Gia,NhaSanXuat,ChatLieu,XuatXu,ThongTinSP,MaSanPham,GiaVon";

			$value = "('".$cate."'".","."'".$name."'".","."'".$image."'".","."'".$price."'".","."'".$year."'".","."'".$material."'".","."'".$origin."'".","."'".$content."'".","."'".$code."'".","."'".$firstprice."')";

			
			$result = $this->insert('san_pham',$key,$value);

			if($result){	

				$success['success'] = "<p style='color:red;'>Thêm sản phẩm thành công</p>";

				$selectCate = $this->selectAll('danh_muc_san_pham');

				return compacts("admin/content/product/add",[ 'selectCate' => $selectCate, 'success' => $success ]);
			}

		}else{


			$selectCate = $this->selectAll('danh_muc_san_pham');

			return compacts("admin/content/product/add",[ 'selectCate' => $selectCate, 'error' => $error ]);

		}

	}else{

		$selectCate = $this->selectAll('danh_muc_san_pham');

		return compacts("admin/content/product/add",[ 'selectCate' => $selectCate ]);

	}

}	
public function pagination($page = 0,$per = 0){

	if($page == "" || $page == 1){
		$page = 0;
	}else{
		$page = ($page*$per) - $per;
	}

	if(isset($_GET['action'])){

		$action = $_GET['action'];

		if($action == "info"){

			$id = $_GET['id'];

			$selectJoin2Where = $this->selectJoin2Where('san_pham','IDDanhMuc','danh_muc_san_pham','ID','ID',$id);

			if($selectJoin2Where){

				return compacts("admin/content/product/info",[ 'selectJoin2Where' => $selectJoin2Where ]);

			}

		}else if($action == "edit"){

			$id = $_GET['id'];

			if(isset($_POST['update'])){

				$name = $_POST['name'];

				$cate = $_POST['cate'];

				$file_name = trim($_FILES['hinhanh']['name']);
				$file_size = $_FILES['hinhanh']['size'];
				$file_tmp = $_FILES['hinhanh']['tmp_name'];

				move_uploaded_file($file_tmp,"../../uploads/".$file_name);

				$price = $_POST['price'];

				$year = $_POST['year'];

				$material = $_POST['material'];

				$origin = $_POST['origin'];

				$content = $_POST['content'];

				if(!empty($file_name)){

					$keysp = "IDDanhMuc = '".$cate."',Tensp = '".$name."',HinhAnhSP = '".$file_name."',Gia = '".$price."',NhaSanXuat = '".$year."',ChatLieu = '".$material."',XuatXu = '".$origin."',ThongTinSP = '".$content."'";

					$updateUser = $this->update('san_pham',$keysp,'ID',$id);

					if($updateUser){

		

						$selectJoin2Where = $this->selectJoin2Where('san_pham','IDDanhMuc','danh_muc_san_pham','ID','ID',$id);

						$selectCate = $this->selectAll('danh_muc_san_pham');

						if($selectJoin2Where){

							echo $success['success'] = "<p style='color:green;'>Sửa sản phẩm thành công</p>";

							return compacts("admin/content/product/edit",[ 'selectJoin2Where' => $selectJoin2Where,'selectCate' => $selectCate,'success' => $success ]);

						}
					}

				}else{

					$selectJoin2Where = $this->selectJoin2Where('san_pham','IDDanhMuc','danh_muc_san_pham','ID','ID',$id);

					$hinhanh = $selectJoin2Where[0]['HinhAnhSP'];

					$keysp = "IDDanhMuc = '".$cate."',Tensp = '".$name."',HinhAnhSP = '".$hinhanh."',Gia = '".$price."',NhaSanXuat = '".$year."',ChatLieu = '".$material."',XuatXu = '".$origin."',ThongTinSP = '".$content."'";

					$updateUser = $this->update('san_pham',$keysp,'ID',$id);

					if($updateUser){

						$success['success'] = "<p style='color:green;'>Sửa sản phẩm thành công</p>";

		

						$selectJoin2Where = $this->selectJoin2Where('san_pham','IDDanhMuc','danh_muc_san_pham','ID','ID',$id);

						$selectCate = $this->selectAll('danh_muc_san_pham');

						if($selectJoin2Where){

							echo $success['success'] = "<p style='color:green;'>Sửa sản phẩm thành công</p>";

							return compacts("admin/content/product/edit",[ 'selectJoin2Where' => $selectJoin2Where,'selectCate' => $selectCate,'success' => $success ]);

						}
					}

				}

				
			}


			$selectJoin2Where = $this->selectJoin2Where('san_pham','IDDanhMuc','danh_muc_san_pham','ID','ID',$id);

			$selectCate = $this->selectAll('danh_muc_san_pham');

			if($selectJoin2Where){

				return compacts("admin/content/product/edit",[ 'selectJoin2Where' => $selectJoin2Where,'selectCate' => $selectCate ]);

			}

		}else if($action == "delete"){

			$id = $_GET['id'];

			$delete = $this->delete('san_pham','ID',$id);

			if($delete){
				header('Location: ' . $_SERVER['HTTP_REFERER']);
			}

		}
	}

	if(isset($_POST['search'])){

		$osearch = trim($_POST['textsearch']);

		$search = $this->search('san_pham','Tensp',$osearch);

		$pagiPro = $this->paginationProduct('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$page,$per);

		$selectProduct = $this->selectProduct('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$per);

		$selectAllProduct = $this->selectJoin2('san_pham','IDDanhMuc','danh_muc_san_pham','ID');

		return compacts("admin/content/product/index",	
		[ 	
			'pagiPro' => $pagiPro, 
			'selectProduct' => $selectProduct, 
			'selectAllProduct' => $selectAllProduct,
			'search' => $search
		]);

	}

	$pagiPro = $this->paginationProduct('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$page,$per);

	$selectProduct = $this->selectProduct('san_pham','IDDanhMuc','danh_muc_san_pham','ID',$per);

	$selectAllProduct = $this->selectJoin2('san_pham','IDDanhMuc','danh_muc_san_pham','ID');

	return compacts("admin/content/product/index",[ 'pagiPro' => $pagiPro, 'selectProduct' => $selectProduct, 'selectAllProduct' => $selectAllProduct ]);

	}
}
?>	