<?php
$header = new HomeController();
$header->header();

if(!isset($_GET['controller'])){

	$content = new HomeController();
	$content->content();

}else{
	if($_GET['controller'] == "introduce"){

		$introduce = new HomeController();
		$introduce->introduce();

	}else if($_GET['controller'] == "shop"){

		$product = new ProductController();

		if(isset($_GET['trang'])){
			
			$product->pagination($_GET['trang']);

		}else{

			$product->pagination(1);

		}

	}else if($_GET['controller'] == "category"){

		$category = new CategoryController();
		$category->category(1);

	}else if($_GET['controller'] == "new"){

		$new = new NewController();

		if(isset($_GET['trang'])){

			$new->pagination($_GET['trang']);

		}else{
			
			$new->pagination(1);

		}

	}else if($_GET['controller'] == "contact"){  

		$category = new ContactController();
		$category->contact();

	}else if($_GET['controller'] == "profile"){
	    
	   	$user = new UserController();
		$user->profile();
	    
	}else if($_GET['controller'] == "login"){
	    
		$user = new UserController();
	 	$user->index();
	 
 	}else if($_GET['controller'] == "register"){
	    
	   	$login = new UserController();
		$login->register();
	    
	}else if($_GET['controller'] == "logout"){
	    
	   	$logout = new UserController();
		$logout->logout();
	    
	}else if($_GET['controller'] == "wishlist"){

		HomeController::wishlist();

	}else if($_GET['controller'] == "cart"){

		CartController::cart();

	}else if($_GET['controller'] == "order"){
		
		$category = new OrderController();
		$category->order();

	}
	else{

		echo "Lỗi 404";	
		
	}


}

// $footer = new HomeController();
$header->footer();
?>	