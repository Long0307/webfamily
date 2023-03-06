<?php
	require_once("../../Model/admin/Model.php");

	class sliderModel
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

		public function selectslider($table,$numNew){
			return $this->obj->selectCom($table,$numNew);
		}

		public function paginationslider($table,$page,$numNew){
			return $this->obj->paginationCom($table,$page,$numNew);
		}

		public function delete($table,$dk,$id){
			return $this->obj->delete($table,$dk,$id);
		}

		public function update($table,$key,$dk,$para){
			return $this->obj->update($table,$key,$dk,$para);
		}

		public function selectOne($table,$dk,$id){
			return $this->obj->selectOne($table,$dk,$id);
		}

	}

?>