<?php

	if(!isset($_SESSION)){
        session_start();
    }
	
    if(!isset($_SESSION['infoMember'])){
        header("location:../../admin/login.html");
    }else{

        function getPath($path = false){ 

	        $path = $path != false ? $path : $_SERVER['REQUEST_URI'];

	        if(empty($_SESSION['infoMember']['MiddlewareUser'])){
	            return false; 
	        }

	        $currentMiddleWare = $_SESSION['infoMember']['MiddlewareUser'];

	        foreach ($currentMiddleWare as $key => $value) {
	        	if($value == $path){
	        		return true;
	        	}
	        }
        }

      	$content = new HomeController();

		$content->header();

		if(!isset($_GET['controller'])){

			$content->content();

		}else{	

			$controller = $_GET['controller'];

			$action = "";

			if(isset($_GET['action'])){

				$action = $_GET['action'];

			}

			if($controller == "category"){

				$category = new CategoryController();

				if(isset($_GET['trang'])){

					$category->pagination($_GET['trang']);

				}else{

					$category->pagination(1);

				}

			}else if($controller == "logo"){

				$redirect = new RedirectController();

				$redirect->logo();
				

			}else if($controller == "favicon"){

				$redirect = new RedirectController();

				$redirect->favicon();
				

			}else if($controller == "megamenu"){

				$redirect = new RedirectController();
				
				$redirect->megamenu();			

			}else if($controller == "informationdirectory"){

				$redirect = new RedirectController();

				if($action == "add"){

					$redirect->getAdd();

				}else if($action == "edit"){

					$redirect->edit();

				}else if($action == "deleteinfoderect"){

					$redirect->deleteinfoderect();

				}else if($action == "updatemegamenu"){

					$redirect->updatemegamenu();

				}else{

					if(isset($_GET['trang']) && isset($_GET['per'])){

						$redirect->informationdirectory($_GET['trang'],$_GET['per']);

					} elseif (isset($_GET['trang']) && !isset($_GET['per'])) {

						$redirect->informationdirectory($_GET['trang'],5);

					} elseif (!isset($_GET['trang']) && isset($_GET['per'])) {

						$redirect->informationdirectory(1,$_GET['per']);

					} else {
						$redirect->informationdirectory(1,5);
					}
					
				}	

			}else if($controller == "product"){

				$product = new ProductController();

				if($action == "add"){

					$product->getAdd();

				}else{

					if(isset($_GET['trang']) && isset($_GET['per'])){

						$product->pagination($_GET['trang'],$_GET['per']);

					} elseif (isset($_GET['trang']) && !isset($_GET['per'])) {

						$product->pagination($_GET['trang'],5);

					} elseif (!isset($_GET['trang']) && isset($_GET['per'])) {

						$product->pagination(1,$_GET['per']);

					} else {
						$product->pagination(1,5);
					}

				}

			}else if($controller == "commentsPro"){

				if(isset($_GET['trang'])){

					CommentsController::pagination($_GET['trang']);

				}else{

					CommentsController::pagination();

				}

			}else if($controller == "news"){

				$news = new NewController();

				if($action == "add"){

					$news->getAdd();

				}else{

					if(isset($_GET['trang'])){

						$news->pagination($_GET['trang']);

					}else{

						$news->pagination(1);

					}

				}

			}else if($controller == "order"){

				$order = new OrderController();

				if($action == "add"){

					$order->getAdd();

				}else{

					if(isset($_GET['trang'])){

						$order->pagination($_GET['trang']);

					}else{

						$order->pagination(1);

					}

				}

			}else if($controller == "productInventory"){

				$productInventory = new ProductInventoryController();

				if($action == "add"){

					$productInventory->getAdd();

				}else{

					if(isset($_GET['trang'])){

						$productInventory->pagination($_GET['trang']);

					}else{

						$productInventory->pagination(1);

					}

				}

			}else if($controller == "slider"){

				$slider = new SliderController();

				if($action == "add"){

					$slider->getAdd();

				}elseif($action == "edit"){

					$slider->edit();

				}elseif($action == "updated"){

					$slider->updated();

				}else{

					if(isset($_GET['trang'])){

						$slider->pagination($_GET['trang']);

					}else{

						$slider->pagination(1);

					}

				}

			}
			else if($controller == "contact"){

				$contact = new ContactController();

				if(isset($_GET['trang'])){

					$contact->show($_GET['trang']);

				}else{

					$contact->show(1);

				}

			}else if($controller == "contactInfo"){

				$contact = new ContactController();

				$contact->change(1);

			}else if($controller == "customer"){

				$customer = new CustomerController();

				if(isset($_GET['trang'])){

					$customer->index($_GET['trang']);

				}else{

					$customer->index(1);

				}

			}else if($controller == "member"){

				$member = new MemberController();

				$member->show();
				
			}else if($controller == "logout"){

				session_destroy();

				header("Location:../../admin/login.html");

			}else if($controller == "changepass"){

				$changepass = new ChangePassController();

				$changepass->show();

			}else{

				echo "Lỗi 404";

			}
		}	

		$content->navbar();
		$content->footer();

    }



?>