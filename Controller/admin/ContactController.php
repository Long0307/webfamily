	<?php
	require_once("../../Model/admin/ContactModel.php");
	class ContactController extends ContactModel
	{
		
		public function show($page = 0){

			if($page == "" || $page == 1){
				$page = 0;
			}else{
				$page = ($page*5)-5;
			}

			if(isset($_GET['action']) && ($_GET['action'] == "info")){

				$id = $_GET['id'];

				$selectOne = $this->selectOne('y_kien_khach_hang','ID',$id);

				return compacts("admin/content/contact/info",[ 'selectOne' => $selectOne ]);

			}else if(isset($_GET['action']) && ($_GET['action'] == "delete")){

				$id = $_GET['id'];

				$delete = $this->delete('y_kien_khach_hang','ID',$id);

				$selectAll = $this->selectAll('y_kien_khach_hang');

				$pagiContact = $this->paginationContact('y_kien_khach_hang',$page,5);

				$selectContact = $this->selectContact('y_kien_khach_hang',5);

				return compacts("admin/content/contact/index",	
				[ 	
					'selectAll' => $selectAll,
					'pagiContact' => $pagiContact,
					'selectContact' => $selectContact, 
				]);

			}elseif(isset($_POST['search'])){

				$osearch = trim($_POST['textsearch']);

				$search = $this->search('y_kien_khach_hang','Email',$osearch);

				$selectAll = $this->selectAll('y_kien_khach_hang');

				$pagiContact = $this->paginationContact('y_kien_khach_hang',$page,5);

				$selectContact = $this->selectContact('y_kien_khach_hang',5);

				return compacts("admin/content/contact/index",	
				[ 	
					'selectAll' => $selectAll,
					'pagiContact' => $pagiContact,
					'selectContact' => $selectContact, 
					'search' => $search

				]);

			}

			$selectAll = $this->selectAll('y_kien_khach_hang');

			$pagiContact = $this->paginationContact('y_kien_khach_hang',$page,5);

			$selectContact = $this->selectContact('y_kien_khach_hang',5);

			return compacts("admin/content/contact/index",	
			[ 	
				'selectAll' => $selectAll,
				'pagiContact' => $pagiContact,
				'selectContact' => $selectContact, 
			]);
		}

		public function change(){

			if(isset($_POST['updateInfoWeb'])){

				if(!empty($_POST['phone'])){
					$phone = trim($_POST['phone']);
				}else{
					$phone = "";
				}

				if(!empty($_POST['address'])){
					$address = trim($_POST['address']);
				}else{
					$address = "";
				}

				if(!empty($_POST['opentime'])){
					$opentime = trim($_POST['opentime']);
				}else{
					$opentime = "";
				}

				if(!empty($_POST['email'])){
					$email = trim($_POST['email']);
				}else{
					$email = "";
				}

				if(!empty($_POST['copyright'])){
					$copyright = trim($_POST['copyright']);
				}else{
					$copyright = "";
				}

				if(!empty($_POST['facebook'])){
					$facebook = trim($_POST['facebook']);
				}else{
					$facebook = "";
				}

				if(!empty($_POST['twitter'])){
					$twitter = trim($_POST['twitter']);
				}else{
					$twitter = "";
				}

				if(!empty($_POST['g+'])){
					$gp = trim($_POST['g+']);
				}else{
					$gp = "";
				}

				if(!empty($_POST['youtube'])){
					$youtube = trim($_POST['youtube']);
				}else{
					$youtube = "";
				}

				if(!empty($_POST['pinterest'])){
					$pinterest = trim($_POST['pinterest']);
				}else{
					$pinterest = "";
				}

				if(!empty($_POST['instagram'])){
					$instagram = trim($_POST['instagram']);
				}else{
					$instagram = "";
				}	

				if(!empty($_POST['company'])){
					$company = trim($_POST['company']);
				}else{
					$company = "";
				}

				if(!empty($_POST['aboutus'])){
					$aboutus = trim($_POST['aboutus']);
				}else{
					$aboutus = "";
				}	

				$content = trim(strip_tags($_POST['content']));

				if(empty($_FILES['image']['name'])){
					
					$keysp = "phone = '".$phone."',address = '".$address."',opentime = '".$opentime."',email = '".$email."',copyright = '".$copyright."',facebook = '".$facebook."',twitter = '".$twitter."',gp = '".$gp."',youtube = '".$youtube."',pinterest = '".$pinterest."',instagram = '".$instagram."',map = '".$content."',tencongty = '".$company."',vechungtoi = '".$aboutus."'";

					$updateUser = $this->update('thong_tin_web',$keysp,'id',1);

					$selectOne = $this->selectOne('thong_tin_web','id',1);

					return compacts("admin/content/contact/InfoContact",[ 'selectOne' => $selectOne ]);

				}else{

					$file_name = trim($_FILES['image']['name']);
					$file_size = $_FILES['image']['size'];
					$file_tmp = $_FILES['image']['tmp_name'];

					move_uploaded_file($file_tmp,"../../uploads/".$file_name);

					$keysp = "phone = '".$phone."',address = '".$address."',opentime = '".$opentime."',email = '".$email."',logo = '".$file_name."',copyright = '".$copyright."',facebook = '".$facebook."',twitter = '".$twitter."',gp = '".$gp."',youtube = '".$youtube."',pinterest = '".$pinterest."',instagram = '".$instagram."',map = '".$content."',tencongty = '".$company."',vechungtoi = '".$aboutus."'";

					$updateUser = $this->update('thong_tin_web',$keysp,'id',1);

					$selectOne = $this->selectOne('thong_tin_web','id',1);

					return compacts("admin/content/contact/InfoContact",[ 'selectOne' => $selectOne ]);

				}
			}

			$selectOne = $this->selectOne('thong_tin_web','id',1);

			return compacts("admin/content/contact/InfoContact",[ 'selectOne' => $selectOne ]);
		}
	}
?>