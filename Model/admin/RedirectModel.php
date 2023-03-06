<?php
	require_once("../../Model/admin/Model.php");

	class RedirectModel
	{
		private $obj;

		public function __construct(){
			$this->obj = new BaseModel;
		}

		public function selectOne($table,$dk,$id){
			return $this->obj->selectOne($table,$dk,$id);
		}

		public function update($table,$key,$dk,$para){
			return $this->obj->update($table,$key,$dk,$para);
		}

		public function insert($table,$user,$pass){
			return $this->obj->insert($table,$user,$pass);
		}

		public function paginationCom($table,$page,$numNew){
			return $this->obj->paginationCom($table,$page,$numNew);
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);
		}

		public function selectCom($table,$numNew){
			return $this->obj->selectCom($table,$numNew);
		}

		public function search($table,$key,$osearch){
			return $this->obj->search($table,$key,$osearch);
		}
		
		public function delete($table,$dk,$id){
			return $this->obj->delete($table,$dk,$id);
		}
	}
?> 