<?php

require_once("../../Model/admin/MemberModel.php");

$error = array();
$success = array();

class MemberController extends MemberModel
{

	public function show(){

		$action = "";

		if(isset($_GET['action'])){

			$action = $_GET['action'];

			if($action == "add"){

				if(isset($_POST['add'])){

					if(empty($_FILES['hinhanh']['name'])){

			        	$error['nullhinhanh'] = "<p style='color:red;'><p style='color:red;'>Không được để trống avatar<p>";

			        }else{

			        	$file_name = trim($_FILES['hinhanh']['name']);
				        $file_size = $_FILES['hinhanh']['size'];
				        $file_tmp = $_FILES['hinhanh']['tmp_name'];

				        move_uploaded_file($file_tmp,"../../public/logo/".$file_name);

			        }


			        if(empty($_POST['username'])){

			        	$error['nullUsername'] = "<p style='color:red;'><p style='color:red;'>Không được để trống tên đăng nhập<p>";

			        }else{

			        	$username = trim($_POST['username']);

			        }

			        if(empty($_POST['fullname'])){

			        	$error['nullfullname'] = "<p style='color:red;'>Không được để trống họ và tên</p>";

			        }else{

			        	$fullname = trim($_POST['fullname']);

			        }

			        if(empty($_POST['password'])){

			        	$error['nullpassword'] = "<p style='color:red;'>Không được để trống mật khẩu</p>";

			        }else{

			        	$password = trim($_POST['password']);

			        }

			        if(!empty($_POST['password-repeat'])){

			        	$passwordrepeat = $_POST['password-repeat'];

			        	if($passwordrepeat != $password){

			        		$error['passwordnot='] = "Nhập lại mật khẩu <p style='color:red;'>không trùng khớp</p>";

			        	}

			        }else{

			        	$error['nullpassword-repeat'] = "<p style='color:red;'>Không được để trống nhập lại mật khẩu</p>";

			        }

			        if(empty($_POST['email'])){

			        	$error['nullemail'] = "<p style='color:red;'>Không được để trống email</p>";

			        }else{

			        	$email = trim($_POST['email']);

			       	}

			       	if(!empty($_FILES['hinhanh']) && 
			       		!empty($_POST['username']) && 
			       		!empty($_POST['fullname']) && 
						!empty($_POST['password']) && 
						!empty($_POST['password-repeat']) && 
						!empty($_POST['email']))
			       	{

			       		if($_POST['password'] == $_POST['password-repeat']){

			       			

							$key = "HinhAnh,TenDangNhap,HoVaTen,MatKhau,Email";

							$value = "('".$file_name."'".","."'".$username."'".","."'".$fullname."'".","."'".md5($password)."'".","."'".$email."')";

							$result = $this->insert('nguoi_dung_quan_tri',$key,$value);

							if($result){

								$success['success'] = "<p style='color:green;'>Thêm thành công</p>";
 								
 								return compacts("admin/content/member/add",	
								[ 	
									'success' => $success
								]);

							}

			       		}

			       	}else{

			       		return compacts("admin/content/member/add",	
						[ 	
							'error' => $error
						]);

			    	}

				}else{

					return views("admin/content/member/add");

				}

				return views("admin/content/member/add");

			}else if($action == "privilege"){

				if(isset($_GET['id'])){

					$id = $_GET['id'];

					

					$selectAllGroup = $this->selectAll('nhom_quyen');

					$selectAllItemGroup = $this->selectAll('quyen_nguoi_dung_admin');

					$selectOne = $this->selectOne('phan_quyen_nguoi_dung','MaNguoiDung',$id);

					$currentPrivilegeList = array();

					if(!empty($selectOne)){

						foreach($selectOne as $currentPrivilege){

							$currentPrivilegeList[] = $currentPrivilege['MaQuyen'];

						}

					}

					if(isset($_POST['savemember'])){

						$id = $_GET['id'];

						$deletePrivilegeUser = $this->delete('phan_quyen_nguoi_dung','MaNguoiDung',$id);

						foreach($_POST['privileges'] as $value){

							$key = "MaNguoiDung,MaQuyen";

							$value = "('".$_GET['id']."'".","."'".$value."')";

							$result = $this->insert('phan_quyen_nguoi_dung',$key,$value);

						}

						

						$selectAllGroup = $this->selectAll('nhom_quyen');

						$selectAllItemGroup = $this->selectAll('quyen_nguoi_dung_admin');

						$selectOne = $this->selectOne('phan_quyen_nguoi_dung','MaNguoiDung',$id);

						$currentPrivilegeList = array();

						if(!empty($selectOne)){

							foreach($selectOne as $currentPrivilege){

								$currentPrivilegeList[] = $currentPrivilege['MaQuyen'];

							}

						}

						return compacts("admin/content/member/privilege",	
							[ 	
								'selectAllGroup' => $selectAllGroup,
								'selectAllItemGroup' => $selectAllItemGroup,
								'selectOne' => $selectOne,
								'currentPrivilegeList' => $currentPrivilegeList
							]);

					}

					return compacts("admin/content/member/privilege",	
						[ 	
							'selectAllGroup' => $selectAllGroup,
							'selectAllItemGroup' => $selectAllItemGroup,
							'selectOne' => $selectOne,
							'currentPrivilegeList' => $currentPrivilegeList
						]);

				}
			}else if($action == "edit"){

				if(isset($_GET['id'])){

					$id = $_GET['id'];

					

					$selectOne = $this->selectOne('nguoi_dung_quan_tri','ID',$id);

					// print_r($selectOne);

					if(isset($_POST['editmember'])){

						$file_name = trim($_FILES['hinhanh']['name']);
				        $file_size = $_FILES['hinhanh']['size'];
				        $file_tmp = $_FILES['hinhanh']['tmp_name'];

				        move_uploaded_file($file_tmp,"../../public/logo/".$file_name);

				        $username = trim($_POST['username']);

				        $fullname = trim($_POST['fullname']);

				        $email = trim($_POST['email']);

				        if(!empty($file_name)){

				        	$keyuser = "HinhAnh = '".$file_name."',TenDangNhap = '".$username."',HoVaTen = '".$fullname."',Email = '".$email."'";

				        	$updateUser = $this->update('nguoi_dung_quan_tri',$keyuser,'ID',$id);

				        	if($updateUser){
					        
					        	$success['updatesuccess'] = "<p style='color:green'>Sửa thành công</p>";
					        	
					        	$selectOne = $this->selectOne('nguoi_dung_quan_tri','ID',$id);

						        return compacts("admin/content/member/edit",	
								[ 	
									'selectOne' => $selectOne,
									'success' => $success
								]);
					        }

				        }else{

				        	$hinhanh = $selectOne[0]['HinhAnh'];

				        	$keyuser = "HinhAnh = '".$hinhanh."',TenDangNhap = '".$username."',HoVaTen = '".$fullname."',Email = '".$email."'";

				        	$updateUser = $this->update('nguoi_dung_quan_tri',$keyuser,'ID',$id);

				        	if($updateUser){

					        	$success['updatesuccess'] = "<p style='color:green'>Sửa thành công</p>";
					        	
					        	$selectOne = $this->selectOne('nguoi_dung_quan_tri','ID',$id);

						        return compacts("admin/content/member/edit",	
								[ 	
									'selectOne' => $selectOne,
									'success' => $success
								]);
					        }

				        }

				        $selectOne = $this->selectOne('nguoi_dung_quan_tri','ID',$id);

				        return compacts("admin/content/member/edit",	
						[ 	
							'selectOne' => $selectOne
						]);

					}

					return compacts("admin/content/member/edit",	
					[ 	
						'selectOne' => $selectOne
					]);
				
				}

			}else if($action == "delete"){

				if(isset($_GET['id'])){

					$id = $_GET['id'];

					

					$delete = $this->delete('nguoi_dung_quan_tri','ID',$id);

					$userAdmin = $this->selectAll('nguoi_dung_quan_tri');

					return compacts("admin/content/member/index",	
						[ 	
							'userAdmin' => $userAdmin
						]);

				}

			}
		}

		if(isset($_POST['search'])){ 

			$osearch = trim($_POST['textsearch']);

			

			$search = $this->search('nguoi_dung_quan_tri','TenDangNhap',$osearch);

			$userAdmin = $this->selectAll('nguoi_dung_quan_tri');

			return compacts("admin/content/member/index",	
			[ 	
				'search' => $search,
				'userAdmin' => $userAdmin
			]);

		}

		

		$userAdmin = $this->selectAll('nguoi_dung_quan_tri');

		return compacts("admin/content/member/index",	
			[ 	
				'userAdmin' => $userAdmin
			]);
	}
}
?>