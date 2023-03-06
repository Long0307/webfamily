<?php
	
	if(!isset($_SESSION)){
		session_start();
	}

	require_once("../../Database/config.php");

	Class BaseModel extends Database
	{

		private $login;
		private $runlogin;
		private $rowlogin;

		private $sqlInsert;
		private $runInsert;

		private $sqlSelectJoin2;
		private $runSelectJoin2;
		private $rowSelectJoin2;

		private $update;

		public function __construct()
		{
			parent::__construct();
		}

		public function login($table,$user,$pass){
			$this->login = "SELECT * FROM $table WHERE TenDangNhap = '$user' AND Matkhau = md5($pass)";
			$this->runlogin = mysqli_query($this->conn,$this->login);

			if($this->runlogin){

				$rowlogin = mysqli_fetch_array($this->runlogin); 

				if(!empty($rowlogin['ID'])){

					$sqlGetMiddleware = "SELECT * FROM phan_quyen_nguoi_dung INNER JOIN quyen_nguoi_dung_admin ON phan_quyen_nguoi_dung.MaQuyen = quyen_nguoi_dung_admin.ID WHERE phan_quyen_nguoi_dung.MaNguoiDung = ".$rowlogin['ID'];
	                $runGetMiddleware = mysqli_query($this->conn,$sqlGetMiddleware);

	                // print_r($runGetMiddleware);
	                $rowlogin['MiddlewareUser'] = array();

	                foreach ($runGetMiddleware as $value) {
	                    $rowlogin['MiddlewareUser'][]  = $value['DiaChiURL'];
	                }   

	                $_SESSION['infoMember'] = $rowlogin;

	                return true;

				}else{

					return false;

				}
                

			}
		}
		
		public function checklogin($table,$email,$pass){

			$this->login = "SELECT * FROM $table WHERE email = '$email' AND password = md5($pass)";
			$this->runlogin = mysqli_query($this->conn,$this->login);

			if($this->runlogin){
				
				$this->rowlogin = mysqli_fetch_assoc($this->runlogin);

				ob_start();
				session_start();

				$_SESSION['current_user'] = $this->rowlogin['username'];
	
				$_SESSION['current_info_user'] = 
				array( 		"email" => $this->rowlogin['email'], 
							"phone" => $this->rowlogin['phone'], 
							"password" => $this->rowlogin['password'], 
							"avatar" => $this->rowlogin['avatar'], 
							"id" => $this->rowlogin['id'] );
	
				return true;

			}else{

				return false;

			}

		}

		public function insert($table,$key,$value){

			$this->sqlInsert = "INSERT INTO $table($key) VALUES $value";

			return $this->runInsert = mysqli_query($this->conn,$this->sqlInsert);
		}

		public function insertGetID($table,$key,$value){

			$this->sqlInsert = "INSERT INTO $table($key) VALUES $value";

			if(mysqli_query($this->conn,$this->sqlInsert)){
				return mysqli_insert_id($this->conn);
			}
		}

		public function selectAll($table){
			$this->getAll = "SELECT * FROM ".$table;
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function selectAllRow($table){
			$this->getAll = "SELECT * FROM ".$table;
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$this->rowGetAll = mysqli_num_rows($this->runGetAll);

			return $this->rowGetAll;
		}

		public function selectOne($table,$dk,$id){
			$this->getAll = "SELECT * FROM $table WHERE $table.$dk = $id";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function selectAdvanced($table,$dk1,$dk2,$id1,$id2){
			$this->getAll = "SELECT * FROM $table WHERE $table.$dk1 = $id1 AND $table.$dk2 = $id2";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function delete($table,$dk,$id){
			$this->getAll = "DELETE FROM $table WHERE $table.$dk = $id";
			return $this->runGetAll = mysqli_query($this->conn,$this->getAll);
		}

		public function delete2Conditions($table,$dk1,$id1,$dk2,$id2){
			$this->getAll = "DELETE FROM $table WHERE $table.$dk1 = $id1 AND $table.$dk2 = $id2";
			return $this->runGetAll = mysqli_query($this->conn,$this->getAll);
		}

		public function selectJoin2($table1,$idTable1,$table2,$idTable2){
			$this->sqlSelectJoin2 = "SELECT * FROM $table1
					INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
					";
			$this->runSelectJoin2 = mysqli_query($this->conn,$this->sqlSelectJoin2);
			$selectAll = array();

			while ($rowSelectJoin2 = mysqli_fetch_array($this->runSelectJoin2)) {
				$selectAll[] = $rowSelectJoin2;
			}
			return $selectAll;
		}

		public function selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk){
			$this->sqlSelectJoin2 = "SELECT * FROM $table1
					INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
					WHERE $table1.$key = $dk; 
					";
			$this->runSelectJoin2 = mysqli_query($this->conn,$this->sqlSelectJoin2);
			$selectAll = array();

			while ($rowSelectJoin2 = mysqli_fetch_array($this->runSelectJoin2)) {
				$selectAll[] = $rowSelectJoin2;
			}
			return $selectAll;
		}

		public function selectJoin3Where($table1,$table2,$table3,$idTable1to2,$idTable2to1,$idTable1to3,$idTable3to1,$key,$dk){
			 	$this->sqlSelectJoin2 = "SELECT * FROM $table1
					INNER JOIN $table2 ON $table1.$idTable1to2 = $table2.$idTable2to1
					INNER JOIN $table3 ON $table1.$idTable1to3 = $table3.$idTable3to1
					WHERE $table1.$key = $dk; 
					";

			$this->runSelectJoin2 = mysqli_query($this->conn,$this->sqlSelectJoin2);
			$selectAll = array();

			while ($rowSelectJoin2 = mysqli_fetch_array($this->runSelectJoin2)) {
				$selectAll[] = $rowSelectJoin2;
			}
			return $selectAll;
		}

		public function paginationProduct($table1,$idTable1,$table2,$idTable2,$page,$limit){
			$this->getAll = "SELECT * FROM $table1
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
			ORDER BY $table1.ID DESC LIMIT $page,$limit";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		} 

		public function selectProduct($table1,$idTable1,$table2,$idTable2,$numPro){
			echo $this->getAll = "SELECT * FROM $table1
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
			ORDER BY $table1.ID DESC LIMIT $numPro";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function paginationCom($table,$page,$numNew){
			$this->getAll = "SELECT * FROM $table LIMIT $page,$numNew";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		} 

		public function selectCom($table,$numNew){
			$this->getAll = "SELECT * FROM $table LIMIT $numNew";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function selectJoin2WithId($table1,$idTable1,$table2,$idTable2,$key,$idsp){ // cái này là được
			$this->getAll = "SELECT * FROM $table1
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
			WHERE $table1.$key = $idsp";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function update($table,$key,$dk,$para){

			$this->update = "UPDATE $table SET $key WHERE $dk = $para";

			mysqli_query($this->conn,$this->update);

		}

		public function updateAll($table,$key){

			$this->update = "UPDATE $table SET $key";

			mysqli_query($this->conn,$this->update);

		}

		public function search($table,$key,$osearch){
			$this->getAll = "SELECT * FROM $table WHERE $key LIKE '%$osearch%'";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function searchMulCon($table,$key1,$key2,$osearch1,$osearch2){
			if(($osearch1 != "") && ($osearch2 != "")){
				
				$this->getAll = "SELECT * FROM $table WHERE ($key1 LIKE '%$osearch1%') AND ($key2 LIKE '%$osearch2%')";
				$this->runGetAll = mysqli_query($this->conn,$this->getAll);
				$result = array();

				while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
					$result[] = $this->rowGetAll;
				}

				return $result;

			}elseif(($osearch1 == "") && ($osearch2 != "")){

				$this->getAll = "SELECT * FROM $table WHERE $key2 LIKE '%$osearch2%'";
				$this->runGetAll = mysqli_query($this->conn,$this->getAll);
				$result = array();

				while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
					$result[] = $this->rowGetAll;
				}

				return $result;

			}elseif(($osearch1 != "") && ($osearch2 == "")){

				$this->getAll = "SELECT * FROM $table WHERE $key1 LIKE '%$osearch1%'";
				$this->runGetAll = mysqli_query($this->conn,$this->getAll);
				$result = array();

				while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
					$result[] = $this->rowGetAll;
				}

				return $result;

			}
		}

		public function checkTk_old($username,$password_old){
			$this->getAll = "SELECT * FROM nguoi_dung_quan_tri WHERE TenDangNhap = '$username' AND Matkhau = '".md5($password_old)."'";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);

			$this->rowGetAll = mysqli_fetch_array($this->runGetAll);

			if($this->rowGetAll){
				return true;
			}else{
				return false;
			}
			
		}

		public function updateMKnew($password_new,$username,$password_old){
			$this->getAll = "UPDATE nguoi_dung_quan_tri SET Matkhau = '".md5($password_new)."' WHERE  TenDangNhap = '$username' AND Matkhau = '".md5($password_old)."'";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			if($this->rowGetAll){
				return true;
			}else{
				return false;
			}
		}

		public function paginationOrderSort($table,$fields,$sl,$where){

				$this->getAll = "SELECT * FROM $table ORDER BY $fields DESC LIMIT $sl";
				$this->runGetAll = mysqli_query($this->conn,$this->getAll);
				$result = array();

				while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
					$result[] = $this->rowGetAll;
				}
				return $result;
		}

		/////////////////////////////////////////////////

		public function selectJoin2Desc($table1,$idTable1,$table2,$idTable2){
			$this->sqlSelectJoin2 = "SELECT * FROM $table1
					INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2 ORDER BY $table1.ID DESC
					";
			$this->runSelectJoin2 = mysqli_query($this->conn,$this->sqlSelectJoin2);
			$selectAll = array();

			while ($rowSelectJoin2 = mysqli_fetch_array($this->runSelectJoin2)) {
				$selectAll[] = $rowSelectJoin2;
			}
			return $selectAll;
		}

		public function paginationComDesc($table1,$idTable1,$table2,$idTable2,$page,$limit){
			$this->getAll = "SELECT * FROM $table1
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
			ORDER BY $table1.ID DESC LIMIT $page,$limit";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		} 

		public function selectComDesc($table1,$idTable1,$table2,$idTable2,$numPro){
			$this->getAll = "SELECT * FROM $table1
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
		 	ORDER BY $table1.ID DESC LIMIT $numPro";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}
}


?>