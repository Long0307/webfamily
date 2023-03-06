<?php

require_once("../../Model/admin/Model.php");

$connectModel = new BaseModel();

$selectOne = $connectModel->checklogin('customer', $_POST['email'], trim($_POST['password']));

if($selectOne == true){
					
    echo "Đăng nhập thành công";

}else if ($selectOne == false){
    
    echo "Bạn đã bị sai email hoặc mật khẩu";

}

?>