<?php

require_once("../../Model/admin/ChangePassModel.php");

$success = array();
$error = array();


class ChangePassController extends ChangePassModel
{	
	public function show(){

		if(isset($_POST['editmember'])){

			$username = trim($_POST['username']);

			$password_old = trim($_POST['password_old']);

			$password_new = trim($_POST['password_new']);

			$checkTk_old = $this->checkTk_old($username,$password_old);

			if($checkTk_old == true){

				$updateMKnew = $this->updateMKnew($password_new,$username,$password_old);

				if($updateMKnew == true){

					$success['success'] = "Đổi mật khẩu thành công";

					return compacts("admin/content/changepass",	
					[ 	
						'success' => $success['success'],
					]);

				}

			}else{

			 	$error['error'] = "Tài khoản hoặc mật khẩu chưa đúng";

			 	return compacts("admin/content/changepass",	
				[ 	
					'error' => $error['error'],
				]);
			 	
			}

		}

		return views("admin/content/changepass");

	}
}
?>
