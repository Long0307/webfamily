<?php

function vn_to_str($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}

$str = str_replace(',','',$str);

$str = str_replace(' ','-',$str);

$str = str_replace('?','',$str);

return strtolower($str);
 
}

?>
<style>
	.dropbtn {
		/* background-color: #4CAF50; */
		color: black;
		/* padding: 16px; */
		font-size: 16px;
		border: none;
	}

	.dropdown {
		position: relative;
		display: inline-block;
	}

	.dropdown-content {
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
		width: 40%;
	}

	.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
	}

	.dropdown-content a:hover {background-color: #ddd;}

	.dropdown:hover .dropdown-content {display: block;}

	/* .dropdown:hover .dropbtn {background-color: #3e8e41;} */
	.chip {
		display: inline-block;
		padding: 0 25px;
		height: 50px;
		font-size: 18px;
		line-height: 50px;
		border-radius: 25px;
		background-color: #f1f1f1;
	}

	.chip img {
		float: left;
		margin: 0 10px 0 -25px;
		height: 50px;
		width: 50px;
		border-radius: 50%;
	}

	.closebtn {
		padding-left: 10px;
		color: #888;
		font-weight: bold;
		float: right;
		font-size: 20px;
		cursor: pointer;
	}

	.closebtn:hover {
		color: #000;
	}
	.header__cart ul li a span.total-dd{
		height: 50px;
		width: 137px;
		background: #7fad39;
		font-size: 10px;
		color: #ffffff;
		line-height: 13px;
		text-align: center;
		font-weight: 700;
		display: inline-block;
		border-radius: 50%;
		position: absolute;
		bottom: 0;
		left: 7px;
	}

	.header__top__right__auth a:hover {
		color: #bdbdbd;
	}
</style>
<?php
ob_start();
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Ogani Template">
	<meta name="keywords" content="Ogani, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PHL.COM</title>
	<base href="http://localhost:8888/webfamily/">
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
	<?php  

        if($data['selectOne'][0]['favicon_customer'] == ""){
          ?>
          <?php
        }else{
          ?>
          <link rel="icon" type="image/png" href="View/customer/inc/<?php echo $data['selectOne'][0]['favicon_customer']; ?>">
          <?php
        }
    ?>

	<link rel="stylesheet" href="public/Customer/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="public/Admin/templateAdmin/fontawesome/css/all.css" type="text/css">
	<link rel="stylesheet" href="public/Customer/css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="public/Customer/css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="public/Customer/css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="public/Customer/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="public/Customer/css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="public/Customer/css/style.css" type="text/css">
	<link rel="stylesheet" href="public/Customer/css/myCSS.css" type="text/css">
	<script src="public/Customer/js/jquery-3.3.1.min.js"></script>
</head>
<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="humberger__menu__overlay"></div>
	<div class="humberger__menu__wrapper">
		<div class="humberger__menu__logo">
			<a href="#"><img src="public/logo/logoweb.png" alt=""></a>
		</div>
		<div id="mobile-menu-wrap">
			<nav class="humberg	er__menu__nav mobile-menu">
				<ul>
					<?php $currentPageUrl = $_SERVER["REQUEST_URI"]; ?>

						<li class="<?php if((trim($currentPageUrl) == '/webfamily/index.html') || (trim($currentPageUrl) == 'index.html')){ echo 'active'; }; ?>"><a href="index.html">Home</a></li>
						<li class="<?php if(strpos(trim($currentPageUrl), 'introduce.html') > 0){ echo 'active'; }; ?>"><a href="introduce.html">Giới thiệu</a></li>
						<li class="<?php if(strpos(trim($currentPageUrl), 'shop.html') > 0){ echo 'active'; }; ?>"><a href="shop.html">Cửa hàng</a></li>	
						<li class="<?php if(strpos(trim($currentPageUrl), 'new.html') > 0){ echo 'active'; }; ?>"><a href="new.html">Bài viết</a></li>
						<li class="<?php if(strpos(trim($currentPageUrl), 'contact.html') > 0){ echo 'active'; }; ?>"><a href="contact.html">Liên hệ</a></li>

				</ul>
			</nav>
		</div>
		<div class="humberger__menu__contact">
			<ul>
				<li><i class="fas fa-envelope"></i>phunglongtn@gmail.com</li>
				<li>0375 769 686</li>
			</ul>
		</div>
	</div>


	<header class="header" 	style="z-index:10;position:fixed;display:inline-block;width:100%;background:white;border-bottom:1px solid #d3d3d3;">
	<div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> phunglongtn@gmail.com</li>
                                <li>Sản phẩm chất lượng đến từ công ty PHL.COM</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fas fa-phone"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                    if(isset($_SESSION['current_user'])){
                                        ?>
                                        <div class="header__top__right__language">
                                            <div><img src="public/avatar_customer/<?php echo $_SESSION['current_info_user']['avatar']; ?>" width=" 20px; "  alt=""><?php echo $_SESSION['current_user']; ?></div>
                                            <span class="arrow_carrot-down"></span>
                                            <ul>
                                                <li><a href="profile.html" style="width='200px';">My Account</a></li>	
                                                <li><a href="#" style="width='200px';">My purchase</a></li>
                                                <li><a href="logout.html" style="width='200px';">Logout</a></li>
                                            </ul>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <a href="ajax/customer/login.php" id="selector" style="float:left;"><i class="fa fa-user"></i> Đăng nhập </a>
                                        <span><a href="register.html" id="selector" style="float:left;">| Đăng ký</a></span>
                                        <?php
                                    }
                                ?>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="header__logo">
						<a href="index.php"><img src="uploads/<?php echo $data['selectOne'][0][5]; ?>" width="150px" height="70px;" alt=""></a>
					</div>
				</div>
				<div class="col-lg-7">
					<nav class="header__menu">
						<ul>
							<?php $currentPageUrl = $_SERVER["REQUEST_URI"]; ?>

							<li class="<?php if((trim($currentPageUrl) == '/webfamily/index.html') || (trim($currentPageUrl) == 'index.html')){ echo 'active'; }; ?>"><a href="index.html">Home</a></li>
							<li class="<?php if(strpos(trim($currentPageUrl), 'introduce.html') > 0){ echo 'active'; }; ?>"><a href="introduce.html">Giới thiệu</a></li>
							<li class="<?php if(strpos(trim($currentPageUrl), 'shop.html') > 0){ echo 'active'; }; ?>"><a href="shop.html">Cửa hàng</a></li>	
							<li class="<?php if(strpos(trim($currentPageUrl), 'new.html') > 0){ echo 'active'; }; ?>"><a href="new.html">Bài viết</a></li>
							<li class="<?php if(strpos(trim($currentPageUrl), 'contact.html') > 0){ echo 'active'; }; ?>"><a href="contact.html">Liên hệ</a></li>

						</ul>
					</nav>
				</div>
				<?php
				$total = 0;
				$quantity = 0;
				if (isset($_SESSION['cart'])) {
					$cart = $_SESSION['cart'];
					foreach ($cart as $value) {
						$quantity += (int)$value['quantity'];
						$total += (int)$value['quantity'] * (int)$value['price-new'];
					}
				}
				?>
				<div class="col-lg-2" id="header_cart_1">
					<div class="header__cart">
						<ul>
							<li>
								<span class="show-cart">
									<div id="show-cart">
										<i class="fa fa-cart-arrow-down fa-2x icon-header" id="icon-show" aria-hidden="true"></i>
										<span id="quantity">

											<?php echo $quantity; ?>

										</span>
										<div class="cart_hover-frame">
											<ul>
												<li>
													<table id="listTable" class="table" style="background-color: #fff; border-radius: 15px;border: 0px solid #FD4040;">
														<tbody style="display: block;overflow-y: scroll;height: 160px;">
															<?php
															if(isset($_SESSION['cart'])){
																$cart = $_SESSION['cart'];
																foreach ($cart as $key => $value) {
																	?>
																	<tr>
																		<td>
																			<input type="hidden" name="soluong" id="quantity_cart_<?php echo $key; ?>" value="<?php echo $value['quantity']; ?>">
																		</td>
																		<td><img src="uploads/<?php echo $value['image']; ?>" alt="" width="50px"></td>
																		<td> 
																			<p class="name" style="color: #085FD6;font-weight: bold;">
																				<?php echo $value['name']; ?>
																			</p>
																			<p>Tổng cộng: <?php echo number_format((int)$value['price-new'], 0, '', ',')." VNĐ"; ?><br>Số lượng: <?php echo $value['quantity']; ?></p></td>

																			<td>

																				<button type="button" class="btn_remove cart-hover-del" onclick="deleteCart(<?php echo $key; ?>)">
																					<i style="color: red;" class="fas fa-trash-alt"></i>
																				</button>
																			</td>

																		</tr>
																		<?php
																	}
																}
																?>
															</tbody>
														</table>
													</li>
													<li style="list-style: none">	
														<a href="cart.html" class="btn btn-success" style="position: absolute;left: 10px;" onclick="location.href='cart.html'">Xem giỏ hàng</a>
														<a href="order.html" class="btn btn-danger" style="position: absolute;left: 130px;" onclick="location.href='order.html'">Thanh toán</a>
														Thành tiền: <br>
														<strong style="line-height: 50px;" id="tongcong-1">
															<?php
															echo number_format($total, 0, '', ',')."đ"; 
															?>
														</strong>
													</li>
												</ul>
											</div>
										</div>
									</span>
								</li>	

							</ul>
						</div>
					</div>
					</span>
					</span>
				</div>
				<div class="humberger__open" style="padding-top: 8px;">

					<i class="fas fa-bars"></i>
				</div>
			</div>
			<script type="text/javascript">
				function deleteCart(id){	

					$.post("ajax/customer/deleteCart.php",{ 'masanpham':id,'quantity':0 },function(data,error){

						$("#listTable").load("index.php #listTable");

						$("#tongcong-1").load("index.php #tongcong-1");

						$("#quantity").load("index.php #quantity");

					});
				}
			</script>
		</header>


