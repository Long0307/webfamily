<?php
	require_once("Model/customer/Model.php");

	class OrderModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new Model;
		}

		public function orders($fullname,$address,$phone,$email,$note){
			return $this->obj->orders($fullname,$address,$phone,$email,$note);
		}

		public function selectOne($table,$key,$id){
			return $this->obj->selectOne($table,$key,$id);
		} 

		public function selectAll($table){
			return $this->obj->selectAll($table);
		}

		public function selectManyCondition($table1,$idTable1,$table2,$idTable2,$id,$key,$condition){
			return $this->obj->selectManyCondition($table1,$idTable1,$table2,$idTable2,$id,$key,$condition);
		}

		public function update($table,$keyandvalue,$key,$dk){
			return $this->obj->update($table,$keyandvalue,$key,$dk);
		}

		public function insert($table,$key,$value){
			return $this->obj->insert($table,$key,$value);
		}

		public function purchasedGetPro($table1,$table2,$table1ID,$table2ID,$order){
			return $this->obj->purchasedGetPro($table1,$table2,$table1ID,$table2ID,$order);
		}

	}

?>