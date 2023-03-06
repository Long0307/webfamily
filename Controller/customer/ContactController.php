<?php
	
	// require_once("Controller.php");
	require_once("Model/customer/ContactModel.php");

	class ContactController extends ContactModel
	{

		public function contact()
		{	
		if(isset($_POST['search-header'])){
			$ContactModel = new ContactModel;

			$keyword = trim($_POST['text-search-header']);

			$searchCate = $ContactModel->searchCate($keyword);	

			if(empty($searchCate)){	

				$searchPro = $ContactModel->searchPro($keyword);

				if(empty($searchPro)){

					$searchNew = $ContactModel->searchNew($keyword);

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

			if(isset($_POST['sendmess'])){

				if(empty($_POST['name'])){

					$error['nullname'] = "<p style='color:red'>Không được để chống tên của bạn</p>";

				}else{

					$name = trim($_POST['name']);

				}

				if(empty($_POST['email'])){

					$error['nullemail'] = "<p style='color:red'>Không được để chống email của bạn</p>";

				}else{

					$email = trim($_POST['email']);
					
				}

				if(empty($_POST['content'])){

					$error['nullcontent'] = "<p style='color:red'>Không được để chống nội dung</p>";

				}else{

					$content = trim($_POST['content']);
					
				}

				$ContactModel = new ContactModel;

				$key = "TenKhachHang,Email,NoiDung";

				$value = "('".$name."'".","."'".$email."'".","."'".$content."')";

				$ContactModel->insert('y_kien_khach_hang',$key,$value);

				$success['sendsuc'] = "<p style='color:green;'>Gửi thành công</p>";

				return compacts("customer/content/contact",[ 'success' => $success['sendsuc'] ]);

			}

			$ContactModel = new ContactModel;

			$selectAll = $ContactModel->selectAll('danh_muc_san_pham');

			$selectOne = $ContactModel->selectOne('thong_tin_web','id',1);

			return compacts("customer/content/contact",[ 'selectAll' => $selectAll, 'selectOne' => $selectOne  ]);
		}
	}

?>