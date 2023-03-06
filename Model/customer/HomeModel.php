<?php
	require_once("Model/customer/Model.php");

	class HomeModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new Model;
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);	
		}

		public function proSold(){
			return $this->obj->proSold("san_pham");
		}

		public function prTop($table,$dk){
			return $this->obj->prTop($table,$dk);
		}

		public function get3New(){
			return $this->obj->get3("bai_viet");
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

		public function selectOne($table,$dk,$id){
			return $this->obj->selectOne($table,$dk,$id);
		}
	}	

?>