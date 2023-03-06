<?php

	// function compacts($view,array $data = [])
	// {
	// 	return require_once("View/".$view.".php");	
	// }
	$error = array();
	function redirect($view, array $data = [])
	{
		return header("location:../../View/".$view);	
	}

	function views($view)
	{
		return require_once("../../View/".$view.".php");	
	}

	function compacts($view,array $data = [])
	{
		return require_once("../../View/".$view.".php");	
	}

	function checkImage($name){

		$file_name = $name['name'];
        $file_size = $name['size'];
        $file_tmp = $name['tmp_name'];

        $explodename = explode('.',$file_name);
        $text = end($explodename);
        $file_ext = strtolower($text);

        $extensions = array("jpeg","jpg","png","gif");

        if(in_array($file_ext,$extensions) === false){
            return $error["err_hinhanh"] = "<p style='color:red;'>Avatar không phù hợp,làm ơn chọn đuôi file phải có jpg, jpeg, png và gif</p>";
        }

        if(empty($error["err_hinhanh"])){
            $hinhanh = $file_name;
            move_uploaded_file($file_tmp,"../../uploads/".$hinhanh);
            return "Thêm thành công";
        }else{
            print_r($error["err_hinhanh"]);
        }
	}

?>