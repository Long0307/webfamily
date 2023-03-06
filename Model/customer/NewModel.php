<?php
	require_once("Model/customer/Model.php");
	class NewModel
	{
		
		private $obj;

		public function __construct(){
			$this->obj = new Model;
		}

		public function selectOne($table,$key,$id){
			return $this->obj->selectOne($table,$key,$id);
		}
		
		public function proSold(){
			return $this->obj->proSold("san_pham");
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);
		}

		public function watchNew($idsp,$table){
			return $this->obj->watchDetail($idsp,$table);
		}

		public function selectNewsSort($table,$key,$sort,$limit){
			return $this->obj->selectNewsSort($table,$key,$sort,$limit);
		}

		public function selectNew($table,$numNew){
			return $this->obj->selectNew($table,$numNew);
		}

		public function paginationNew($table,$page,$numNew){
			return $this->obj->paginationNew($table,$page,$numNew);
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

		public function searchKey($keyword){
			return $this->obj->searchKey($keyword);
		}


	}
?>