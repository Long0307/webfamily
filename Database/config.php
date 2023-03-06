<?php
	require_once("infoConfig.php");

	class Database
	{

		protected $conn;
		public function __construct(){
			$this->conn = mysqli_connect(HOST,USER,PASS,DBNAME) or die("Lỗi");
			if($this->conn){
				mysqli_set_charset($this->conn,'utf8');
				// echo "Kết nối thành công";
			}else{
				echo "Kết nối ko thành công";
			}
		}
	}


?>