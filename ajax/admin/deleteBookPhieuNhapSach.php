<?php
	require_once("../../Model/admin/Model.php");

	if(isset($_POST['masanpham'])){

		foreach ($_SESSION['addpro'] as $key => $value) {
			if($_POST['masanpham'] == $key){

				unset($_SESSION['addpro'][$key]);
				
			}
		}
	}
?>