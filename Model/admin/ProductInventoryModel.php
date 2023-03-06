<?php
	require_once("../../Model/admin/Model.php");

	class ProductInventoryModel
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

		public function selectImportPro($table,$numNew){
			return $this->obj->selectCom($table,$numNew);
		}

		public function paginationImportPro($table,$page,$numNew){
			return $this->obj->paginationCom($table,$page,$numNew);
		}

		public function selectJoin2($table1,$idTable1,$table2,$idTable2){
			return $this->obj->selectJoin2($table1,$idTable1,$table2,$idTable2);
		}

		public function selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk){
			return $this->obj->selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk);
		}

		public function selectJoin3Where($table1,$table2,$table3,$idTable1to2,$idTable2to1,$idTable1to3,$idTable3to1,$key,$dk){
			return $this->obj->selectJoin3Where($table1,$table2,$table3,$idTable1to2,$idTable2to1,$idTable1to3,$idTable3to1,$key,$dk);
		}

		public function delete($table,$dk,$id){
			return $this->obj->delete($table,$dk,$id);
		}

		public function search($table,$key,$osearch){
			return $this->obj->search($table,$key,$osearch);
		}

	}

?>