<?php
	require_once("Model/customer/Model.php");
	class ProductModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new Model;
		}

		public function selectOne($table,$key,$id){
			return $this->obj->selectOne($table,$key,$id);
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);	
		}

		public function selectJoin2($table1,$idTable1,$table2,$idTable2){
			return $this->obj->selectJoin2($table1,$idTable1,$table2,$idTable2);
		}

		public function selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk,$sort,$idsp){
			return $this->obj->selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk,$sort,$idsp);
		}

		public function selectJoin2SameCate($table1,$idTable1,$table2,$idTable2,$idlsp){
			return $this->obj->selectJoin2SameCate($table1,$idTable1,$table2,$idTable2,$idlsp);
		}

		public function selectProduct($table1,$idTable1,$table2,$idTable2,$numPro){
			return $this->obj->selectProduct($table1,$idTable1,$table2,$idTable2,$numPro);
		}

		public function selectProductSameCate($table1,$idTable1,$table2,$idTable2,$idlsp,$numPro){
			return $this->obj->selectProductSameCate($table1,$idTable1,$table2,$idTable2,$idlsp,$numPro);
		}

		public function selectJoin2WithId($table1,$idTable1,$table2,$idTable2,$key,$idsp){
			return $this->obj->selectJoin2WithId($table1,$idTable1,$table2,$idTable2,$key,$idsp);
		}

		public function paginationProduct($table1,$idTable1,$table2,$idTable2,$page,$limit){
			return $this->obj->paginationProduct($table1,$idTable1,$table2,$idTable2,$page,$limit);
		}

		public function paginationProductSameCate($table1,$idTable1,$table2,$idTable2,$idlsp,$page,$limit){
			return $this->obj->paginationProductSameCate($table1,$idTable1,$table2,$idTable2,$idlsp,$page,$limit);
		}

		public function proSold(){
			return $this->obj->proSold("san_pham");
		}

		public function proSoldSame($table,$key,$idlsp){
			return $this->obj->proSoldSame($table,$key,$idlsp);
		}

		public function prTop($table,$dk){
			return $this->obj->prTop($table,$dk);
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

		public function countSamePro($table,$fieldsWhere,$valueidlsp){
			return $this->obj->countSamePro($table,$fieldsWhere,$valueidlsp);
		}


	}


?>