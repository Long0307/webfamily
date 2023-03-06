<?php
	require_once("../../Model/admin/Model.php");

	class ChangePassModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new BaseModel;
		}

		public function checkTk_old($username,$password_old){
			return $this->obj->checkTk_old($username,$password_old);
		}

		public function updateMKnew($password_new,$username,$password_old){
			return $this->obj->updateMKnew($password_new,$username,$password_old);
		}
	
	}

?>