<?php

if(isset($_POST['id']) && isset($_POST['id_customer'])){

    require_once("../../Model/admin/Model.php");

    $connectModel = new BaseModel();

    $connectModel->delete2Conditions("address",'id',$_POST['id'],'id_customer',$_POST['id_customer']);;

    echo "Xong";

}

?>