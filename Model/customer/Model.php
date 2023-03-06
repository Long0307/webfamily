   <?php
	
	if(!isset($_SESSION)){
		session_start();
	}
	if(!@require_once("Database/config.php")) {
	  	require_once("../../Database/config.php");
	}else{
		require_once("Database/config.php");
	}

	Class Model extends Database
	{

		private $login;
		private $runlogin;
		private $rowlogin;

		private $sqlInsert;
		private $runInsert;	

		private $sqlSelectJoin2;
		private $runSelectJoin2;
		private $rowSelectJoin2;

		private $splPrTop;
		private $runPrTop;
		private $rowPrTop;

		private $sqlpurchased;
		private $runpurchased;

		private $sqlGetQuantity;
		private $runGetQuantity;

		private $sqlupdate;
		private $runupdate;

		private $sqlprTop;
		private $runprTop;

		public function __construct()
		{
			parent::__construct();
		}

		public function login($table,$user,$pass){
			$this->login = "SELECT * FROM $table WHERE UserName = '$user' AND PassWord = md5($pass)";
			$this->runlogin = mysqli_query($this->conn,$this->login);

			if($this->runlogin){

				$this->rowlogin = mysqli_fetch_assoc($this->runlogin);

				$_SESSION['infoMember']['username'] = $this->rowlogin['UserName'];

				$_SESSION['infoMember']['avatar'] = $this->rowlogin['HinhAnh'];

				$_SESSION['infoMember']['email'] = $this->rowlogin['Email'];	
				
				return $_SESSION['infoMember'];	

			}
		}

		public function insert($table,$key,$value){

			$this->sqlInsert = "INSERT INTO $table($key) VALUES $value";

			return $this->runInsert = mysqli_query($this->conn,$this->sqlInsert);
		}

		public function selectOne($table,$key,$id){
			$this->getAll = "SELECT * FROM $table WHERE $table.$key = $id";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
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

		function selectJoin2($table1,$idTable1,$table2,$idTable2){
			$this->sqlSelectJoin2 = "SELECT * FROM $table1 
					INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
					WHERE $table1.SoLuongTon > 0
					";
			$this->runSelectJoin2 = mysqli_query($this->conn,$this->sqlSelectJoin2);
			$selectAll = array();

			while ($rowSelectJoin2 = mysqli_fetch_array($this->runSelectJoin2)) {
				$selectAll[] = $rowSelectJoin2;
			}
			return $selectAll;
		}

		public function selectJoin2SameCate($table1,$idTable1,$table2,$idTable2,$idlsp){
			$this->sqlSelectJoin2 = "SELECT * FROM $table1 
					INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
					WHERE $table1.SoLuongTon > 0 AND $table1.$idTable1 = $idlsp
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
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2 WHERE $table1.SoLuongTon > 0
			LIMIT $page,$limit";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function paginationProductSameCate($table1,$idTable1,$table2,$idTable2,$idlsp,$page,$limit){
			$this->getAll = "SELECT * FROM $table1
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2 WHERE $table1.SoLuongTon > 0
			AND $table1.$idTable1 = $idlsp
			LIMIT $page,$limit";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		} 

		public function selectProduct($table1,$idTable1,$table2,$idTable2,$numPro){
			$this->getAll = "SELECT * FROM $table1 
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
			WHERE $table1.SoLuongTon > 0 
			LIMIT $numPro";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function selectProductSameCate($table1,$idTable1,$table2,$idTable2,$idlsp,$numPro){
			$this->getAll = "SELECT * FROM $table1 
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
			WHERE $table1.SoLuongTon > 0 AND $table1.$idTable1 = $idlsp
			LIMIT $numPro";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function selectManyCondition($table1,$idTable1,$table2,$idTable2,$id,$key,$condition){
			$this->getAll = "SELECT * FROM $table1 
			INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
			WHERE $table1.$idTable1 = $id AND $table2.$idTable2 = $id AND $table2.$key = $condition";

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

		public function paginationNew($table,$page,$numNew){
			$this->getAll = "SELECT * FROM $table LIMIT $page,$numNew";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		} 

		public function selectNew($table,$numNew){
			$this->getAll = "SELECT * FROM $table LIMIT $numNew";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function selectNewsSort($table,$key,$sort,$limit){
			$this->getAll = "SELECT * FROM $table ORDER BY $table.$key $sort LIMIT $limit";
			$this->runGetAll = mysqli_query($this->conn,$this->getAll);
			$result = array();

			while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
				$result[] = $this->rowGetAll;
			}
			return $result;
		}

		public function proSold($table){
			$this->splPrTop = "SELECT * FROM $table WHERE $table.SoLuongTon > 0 LIMIT 8";
			$this->runPrTop = mysqli_query($this->conn,$this->splPrTop);
			$result = array();

			while($this->rowPrTop = mysqli_fetch_array($this->runPrTop)) {
				$result[] = $this->rowPrTop;
			}
			return $result;
		}

		public function proSoldSame($table,$key,$idlsp){
			$this->splPrTop = "SELECT * FROM $table WHERE $table.$key = $idlsp AND $table.SoLuongTon > 0 LIMIT 8";
			$this->runPrTop = mysqli_query($this->conn,$this->splPrTop);
			$result = array();

			while($this->rowPrTop = mysqli_fetch_array($this->runPrTop)) {
				$result[] = $this->rowPrTop;
			}
			return $result;
		}

		public function get3($table){
			$this->sql5 = "SELECT * FROM $table LIMIT 3";
			$this->run5 = mysqli_query($this->conn,$this->sql5);
			$result = array();

			while ($this->row5 = mysqli_fetch_array($this->run5)) {
				$result[] = $this->row5;
			}
			return $result;
		}

		public function orders($fullname,$address,$phone,$email,$note){

			$subtotal = 0;
			if(isset($_SESSION['cart'])){
				
				$total = 0;
				foreach ($_SESSION['cart'] as $key => $value) {
					$total = $value["price-new"]*$value["quantity"];
					$subtotal += $total; 
				}
			}

			$this->sqlOrder = "INSERT INTO don_dat_hang(HoVaTen,DiaChi,SoDienThoai,Email,Note,TongTien) VALUES ('$fullname','$address','$phone','$email','$note','$subtotal')"; 

			$this->runOrder = mysqli_query($this->conn,$this->sqlOrder);

			$this->getIdOrder = mysqli_insert_id($this->conn);

			$id = $this->getIdOrder;

			if(isset($_SESSION['cart'])){

				$total = 0;
				foreach ($_SESSION['cart'] as $key => $value) {

					$total = $value["price-new"]*$value["quantity"];

					$this->sqlOrder = 'INSERT INTO chi_tiet_don_hang(`Order_ID`,`Product_ID`,`SoLuong`,`DonGia`) 
					VALUES ('.$id.','.$key.','.$value["quantity"].','.$total.')'; 

					$this->runOrder = mysqli_query($this->conn,$this->sqlOrder);

				}

				return $this->getIdOrder;
			}
		}

		public function purchasedGetPro($table1,$table2,$table1ID,$table2ID,$order){

			$this->sqlpurchased = "SELECT * FROM $table1 WHERE $table1ID = $order";

			$this->runpurchased = mysqli_query($this->conn,$this->sqlpurchased);

			if($this->runpurchased){

				$this->sqlGetQuantity = "SELECT * FROM $table1 
				INNER JOIN $table2 ON $table1.$table1ID = $table2.$table2ID
				WHERE $table1.$table1ID = $order";

				return $this->runGetQuantity = mysqli_query($this->conn,$this->sqlGetQuantity);

			}

		}

		public function update($table,$keyandvalue,$key,$dk){

			$this->sqlupdate = "UPDATE $table SET $keyandvalue WHERE $key = $dk";

			return $this->runupdate = mysqli_query($this->conn,$this->sqlupdate);

		}

		public function prTop($table,$dk){
			$this->splPrTop = "SELECT * FROM $table ORDER BY $dk DESC LIMIT 8";

			$this->runPrTop = mysqli_query($this->conn,$this->splPrTop);

			$result = array();

			while($this->rowPrTop = mysqli_fetch_array($this->runPrTop)) {
				$result[] = $this->rowPrTop;
			}
			return $result;
		}

		private $searchSP;
		private $runsearchSP;
		private $rowsearchSP;

		public function searchPro($keyword){
			
			$this->searchSP = "SELECT * FROM san_pham WHERE Tensp LIKE '%$keyword%'";
			$this->runsearchSP = mysqli_query($this->conn,$this->searchSP);

			if(mysqli_num_rows($this->runsearchSP) == 0){

				return false;

			}else{

				$result = array();

				while($this->rowsearchSP = mysqli_fetch_array($this->runsearchSP)) {
					$result[] = $this->rowsearchSP;
				}
				return $result;

			}

		}

		public function searchCate($keyword){

			$this->searchSP = "SELECT * FROM danh_muc_san_pham 
				INNER JOIN san_pham ON danh_muc_san_pham.ID = san_pham.IDDanhMuc
				WHERE TenDanhMuc LIKE '%$keyword%'";
			$this->runsearchSP = mysqli_query($this->conn,$this->searchSP);

			if(mysqli_num_rows($this->runsearchSP) == 0){

				return false;

			}else{

				$result = array();

				while($this->rowsearchSP = mysqli_fetch_array($this->runsearchSP)) {
					$result[] = $this->rowsearchSP;
				}
				return $result;

			}

		}

		public function searchNew($keyword){
			
			$this->searchSP = "SELECT * FROM bai_viet WHERE TieuDe LIKE '%$keyword%'";
			$this->runsearchSP = mysqli_query($this->conn,$this->searchSP);

			if(mysqli_num_rows($this->runsearchSP) == 0){

				return false;

			}else{

				$result = array();

				while($this->rowsearchSP = mysqli_fetch_array($this->runsearchSP)) {
					$result[] = $this->rowsearchSP;
				}
				return $result;

			}
		}

		public function searchKey($keyword){
			$this->searchSP = "SELECT * FROM bai_viet WHERE NoiDung LIKE '%$keyword%'";
			$this->runsearchSP = mysqli_query($this->conn,$this->searchSP);

			$result = array();

			while($this->rowsearchSP = mysqli_fetch_array($this->runsearchSP)) {
				$result[] = $this->rowsearchSP;
			}
			return $result;

		}

		public function countSamePro($table,$fieldsWhere,$valueidlsp){
			if ($valueidlsp == 0) {
				$this->getAll = "SELECT * FROM ".$table;

				$this->runGetAll = mysqli_query($this->conn,$this->getAll);

				$count = 0;
				while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
					echo $count++;
				}
				return $count;
				
			}else{
				$this->getAll = "SELECT * FROM ".$table." WHERE ".$fieldsWhere." = ".$valueidlsp;

				$this->runGetAll = mysqli_query($this->conn,$this->getAll);

				$count = 0;
				while ($this->rowGetAll = mysqli_fetch_array($this->runGetAll)) {
					echo $count++;
				}
				return $count;
			}

		}

		public function selectJoin2Where($table1,$idTable1,$table2,$idTable2,$key,$dk,$sort,$idsp){
			$this->sqlSelectJoin2 = "SELECT * FROM $table1
					INNER JOIN $table2 ON $table1.$idTable1 = $table2.$idTable2
					WHERE $table1.$key = $dk AND $table2.$idTable2 = $idsp ORDER BY $table1.$sort DESC; 
					";
			$this->runSelectJoin2 = mysqli_query($this->conn,$this->sqlSelectJoin2);
			$selectAll = array();

			while ($rowSelectJoin2 = mysqli_fetch_array($this->runSelectJoin2)) {
				$selectAll[] = $rowSelectJoin2;
			}
			return $selectAll;
		}
	}


?>