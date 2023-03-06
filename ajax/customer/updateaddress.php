<?php
    if(isset($_POST['code']) && isset($_POST['code_customer']) && isset($_POST['fullname']) 

    && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['province']) 

    && isset($_POST['district']) && isset($_POST['ward']) && isset($_POST['nameforaddress'])){
        
        require_once("../../Model/admin/Model.php");

        $connectModel = new BaseModel();

        $updateshipped = "fullname = '".$_POST['fullname']."',phone = '".$_POST['phone']."',addressgetproduct = '".$_POST['address']."'
        ,city = '".$_POST['province']."',district = '".$_POST['district']."',wards = '".$_POST['ward']."',nameforaddress = '".$_POST['nameforaddress']."'";

        $confirm = $connectModel->update('address',$updateshipped,'id',$_POST['code']);

        echo "Sửa thành công";


    }else{

        echo "Lỗi";

    }
?>