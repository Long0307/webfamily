<?php
require_once("../../Model/admin/CustomerModel.php");
class CustomerController extends CustomerModel
{	
	public function index($page = 0)
	{
		if($page == "" || $page == 1){
			$page = 0;
		}else{
			$page = ($page*5)-5;
		}

		if(isset($_GET['action']) && ($_GET['action'] == "info")){

			$id = $_GET['id'];

			$selectOne = $this->selectJoin2WithId('customer','id','address','id_customer','id',$id);

			return compacts("admin/content/customer/info",[ 'selectOne' => $selectOne ]);

		}else if(isset($_GET['action']) && ($_GET['action'] == "delete")){ 

			$id = $_GET['id'];

			$delete = $this->delete('customer','id',$id);

			$selectAll = $this->selectAll('customer');

			$pagiContact = $this->paginationContact('customer',$page,5);

			$selectContact = $this->selectContact('customer',5);

			return compacts("admin/content/customer/index",	
			[ 	
				'selectAll' => $selectAll,
				'pagiContact' => $pagiContact,
				'selectContact' => $selectContact, 
			]);

		}elseif(isset($_POST['search'])){

			$osearch = trim($_POST['textsearch']);

			$search = $this->search('customer','email',$osearch);

			$selectAll = $this->selectAll('customer');

			$pagiContact = $this->paginationContact('customer',$page,5);

			$selectContact = $this->selectContact('customer',5);

			return compacts("admin/content/customer/index",	
			[ 	
				'selectAll' => $selectAll,
				'pagiContact' => $pagiContact,
				'selectContact' => $selectContact, 
				'search' => $search

			]);

		}

		$selectAll = $this->selectAll('customer');

		$pagiContact = $this->paginationContact('customer',$page,5);

		$selectContact = $this->selectContact('customer',5);

		return compacts("admin/content/customer/index",	
		[ 	
			'selectAll' => $selectAll,
			'pagiContact' => $pagiContact,
			'selectContact' => $selectContact, 
		]);

	}
}

;?>