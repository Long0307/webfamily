<?php
    if(isset($_POST['id']) && isset($_POST['id_customer'])){
        
        require_once("../../Model/admin/Model.php");

        $connectModel = new BaseModel();

        $selectOne = $connectModel->selectAdvanced("address","id","id_customer",$_POST['id'],$_POST['id_customer']);

        foreach ($selectOne as $value) {
            echo $value["fullname"]."+".$value["phone"]."+".$value["addressgetproduct"]."+".$value["city"]."+".$value["district"]."+".$value["wards"]."+".$value["nameforaddress"];
        }

    }else{

        echo "Lỗi";

    }
?>