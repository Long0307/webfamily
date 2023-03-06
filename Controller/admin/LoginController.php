<?php
		
	 if(!isset($_SESSION)){
        session_start();
    }

	require_once("Controller.php");
	require_once("../../Model/admin/LoginModel.php");

	class LoginController extends LoginModel
	{	
		public function index()
		{

			if(isset($_POST['user']) && isset($_POST['pass'])){

				$user = trim($_POST['user']);

				$pass = trim($_POST['pass']);

				$login = $this->login("nguoi_dung_quan_tri",$user,$pass);

				if($login == 1){
					
					header("location:../dashboard/");

				}else{
					echo $error['null'] = "<p style='color:white;text-align: center;position:fixed;top:35%;left:43%;'>Sai tài khoản hoặc mật khẩu</p>";
					return compacts("admin/login",	
					[ 	
						'error' => $error['null']
					]);
					// header("location:../../admin.php");
				}
				// header("location:../../admin.php");

			}

		}
	}

?>