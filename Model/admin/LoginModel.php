<?php
	require_once("../../Model/admin/Model.php");

	class LoginModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new BaseModel;
		}

		public function login($table,$user,$pass){
			return $this->obj->login($table,$user,$pass);
		}

		public function insert($table,$user,$pass){
			return $this->obj->insert($table,$user,$pass);
		}

	}
 
?>