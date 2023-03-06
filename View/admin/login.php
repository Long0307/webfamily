<?php

	if(isset($_POST['login'])){
		require_once("../../Model/admin/Model.php");
		require_once("../../Controller/admin/LoginController.php");

		$obj = new LoginController;
		$obj->index();

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ĐĂNG NHẬP VÀO ADMIN</title>
	<!-- Meta tag Keywords -->
	<base href="http://localhost:8888/webfamily/View/admin/">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="../../public/Admin/loginAdmin/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="../../public/Admin/loginAdmin/css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
	<!--header-->
	<div class="header-w3l">
		<h1>ADMIN</h1>
	</div>
	<!--//header-->
	<!--main-->
	<div class="main-w3layouts-agileinfo">
		<!--form-stars-here-->
		<div class="wthree-form">
			<h2>Đăng nhập</h2>
			<?php
				if(isset($data['error'])){
					echo $data['error'];
				}
			?>
			<form action="" method="post">
				<div class="form-sub-w3">
					<input type="text" name="user" placeholder="Username " required="" />
					<div class="icon-w3">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div>
				</div>
				<div class="form-sub-w3">
					<input type="password" name="pass" placeholder="Password" required="" />
					<div class="icon-w3">
						<i class="fa fa-unlock-alt" aria-hidden="true"></i>
					</div>
				</div>
				<div class="clear"></div>
				<div class="submit-agileits">
					<input type="submit" name="login" value="Login">
				</div>
			</form>

		</div>
		<!--//form-ends-here-->

	</div>
	<!--//main-->
	<!--footer-->
	<div class="footer">
		<p>&copy; All rights reserved | Design by <a>Phùng Hữu Long - 18108104 - TH23.13</a></p>
	</div>
	<!--//footer-->
</body>
</html>