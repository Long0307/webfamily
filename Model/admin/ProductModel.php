<?php
	require_once("../../Model/admin/Model.php");

	class ProductModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new BaseModel;
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);
		}

		public function insert($table,$user,$pass){
			return $this->obj->insert($table,$user,$pass);
		}
		
		public function selectJoin2($table1,$idTable1,$table2,$idTable2){
			return $this->obj->selectJoin2($table1,$idTable1,$table2,$idTable2);
		}

		public function selectProduct($table1,$idTable1,$table2,$idTable2,$numPro){
			return $this->obj->selectProduct($table1,$idTable1,$table2,$idTable2,$numPro);
		}

		public function paginationProduct($table1,$idTable1,$table2,$idTable2,$page,$limit){
			return $this->obj->paginationProduct($table1,$idTable1,$table2,$idTable2,$page,$limit);
		}

		public function selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk){
			return $this->obj->selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk);
		}

		public function update($table,$key,$dk,$para){
			return $this->obj->update($table,$key,$dk,$para);
		}

		public function delete($table,$dk,$id){
			return $this->obj->delete($table,$dk,$id);
		}

		public function search($table,$key,$osearch){
			return $this->obj->search($table,$key,$osearch);
		}
	}

?>