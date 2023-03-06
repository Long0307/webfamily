<?php
	require_once("Model/customer/Model.php");

	class LoginModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new Model;
		}

		public function login($table,$user,$pass){
			return $this->obj->login($table,$user,$pass);
		}

		public function insert($table,$user,$pass){
			return $this->obj->insert($table,$user,$pass);
		}

		public function checklogin($table,$email,$pass){
			return $this->obj->checklogin($table,$email,$pass);
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);
		}

		public function selectOne($table,$dk,$id){
			return $this->obj->selectOne($table,$dk,$id);
		}

		public function update($table,$keyandvalue,$key,$dk){
			return $this->obj->update($table,$keyandvalue,$key,$dk);
		}
	}	

?>