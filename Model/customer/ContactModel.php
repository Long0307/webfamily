<?php
	require_once("Model/customer/Model.php");
	class ContactModel
	{
		
		private $obj;

		public function __construct(){
			$this->obj = new Model;
		}

		public function insert($table,$key,$value){
			return $this->obj->insert($table,$key,$value);
		}

		public function searchCate($keyword){
			return $this->obj->searchCate($keyword);
		}

		public function searchPro($keyword){
			return $this->obj->searchPro($keyword);
		}

		public function searchNew($keyword){
			return $this->obj->searchNew($keyword);
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);	
		}

		public function selectOne($table,$key,$id){
			return $this->obj->selectOne($table,$key,$id);
		}

	}
?>