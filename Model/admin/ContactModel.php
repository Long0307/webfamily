	<?php
	require_once("../../Model/admin/Model.php");

	class ContactModel
	{
		
		private $obj;

		public function __construct(){
			$this->obj = new BaseModel;
		}

		public function selectAll($table){
			return $this->obj->selectAll($table);
		}

		public function selectContact($table,$numNew){
			return $this->obj->selectCom($table,$numNew);
		}

		public function paginationContact($table,$page,$numNew){
			return $this->obj->paginationCom($table,$page,$numNew);
		}

		public function selectOne($table,$dk,$id){
			return $this->obj->selectOne($table,$dk,$id);
		}

		public function delete($table,$dk,$id){
			return $this->obj->delete($table,$dk,$id);
		}

		public function search($table,$key,$osearch){
			return $this->obj->search($table,$key,$osearch);
		}

		public function update($table,$key,$dk,$para){
			return $this->obj->update($table,$key,$dk,$para);
		}


	}
?>