<?php
require_once("../../Model/admin/Model.php");

class HomeModel
{
	
	private $obj;

	public function __construct(){
		$this->obj = new BaseModel;
	}

	public function selectAllRow($table){
		return $this->obj->selectAllRow($table);
	}

	public function selectOne($table,$dk,$id){
		return $this->obj->selectOne($table,$dk,$id);
	}

	public function paginationOrderNew($table,$fields,$sl,$where){
		return $this->obj->paginationOrderSort($table,$fields,$sl,$where);
	}

}
?>