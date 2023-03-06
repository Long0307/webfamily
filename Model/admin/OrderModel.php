<?php
	require_once("../../Model/admin/Model.php");

	class OrderModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new BaseModel;
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);
		}

		public function selectOrder($table,$numNew){
			return $this->obj->selectCom($table,$numNew);
		}

		public function paginationOrder($table,$page,$numNew){
			return $this->obj->paginationCom($table,$page,$numNew);
		}

		public function selectJoin3Where($table1,$table2,$table3,$idTable1to2,$idTable2to1,$idTable1to3,$idTable3to1,$key,$dk){
			return $this->obj->selectJoin3Where($table1,$table2,$table3,$idTable1to2,$idTable2to1,$idTable1to3,$idTable3to1,$key,$dk);
		}

		public function update($table,$key,$dk,$para){
			return $this->obj->update($table,$key,$dk,$para);
		}

		public function delete($table,$dk,$id){
			return $this->obj->delete($table,$dk,$id);
		}
		
		public function searchMulCon($table,$key1,$key2,$osearch1,$osearch2){
			return $this->obj->searchMulCon($table,$key1,$key2,$osearch1,$osearch2);
		}

		public function selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk){
			return $this->obj->selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk);
		}

	}

?>