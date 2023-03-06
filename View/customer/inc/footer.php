
	<footer class="footer spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-3 col-sm-6">
					<div class="footer__about">
						<div class="footer__about__logo">
							<a href="./index.html"><img src="uploads/<?php echo $data['selectOneInfo'][0][5]; ?>" alt=""></a>
						</div>
						<ul>
							<li>Tên công ty: <?php echo $data['selectOneInfo'][0][14]; ?></li>
							<li>Address: <?php echo $data['selectOneInfo'][0][2]; ?></li>
							<li>Phone: <?php echo $data['selectOneInfo'][0][1]; ?></li>
							<li>Email: <?php echo $data['selectOneInfo'][0][4]; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-6">
					<div class="footer__widget">
						<h6>MENU</h6>
						<ul>
							<?php $currentPageUrl = $_SERVER["REQUEST_URI"]; ?>

							<li class="<?php if((trim($currentPageUrl) == '/webfamily/index.html') || (trim($currentPageUrl) == 'index.html')){ echo 'active'; }; ?>"><a href="index.html">Home</a></li>
							<li class="<?php if(strpos(trim($currentPageUrl), 'introduce.html') > 0){ echo 'active'; }; ?>"><a href="introduce.html">Giới thiệu</a></li>
							<li class="<?php if(strpos(trim($currentPageUrl), 'shop.html') > 0){ echo 'active'; }; ?>"><a href="shop.html">Cửa hàng</a></li>	
							<li class="<?php if(strpos(trim($currentPageUrl), 'new.html') > 0){ echo 'active'; }; ?>"><a href="new.html">Bài viết</a></li>
							<li class="<?php if(strpos(trim($currentPageUrl), 'contact.html') > 0){ echo 'active'; }; ?>"><a href="contact.html">Liên hệ</a></li>

						</ul>
					</div>
				</div> 
				<div class="col-lg-3 col-md-3 col-sm-6">
					<div class="footer__widget">
						<h6>THEO DÕI VÀ LIÊN LẠC</h6>
						<br>
						<?php
							for ($i=7; $i <= 13 ; $i++) { 
								if($data['selectOneInfo'][0][$i] != null){
									if($i == 7){
										?>
											<div class="footer__widget__social">
												<div class="hero__search__phone__icon" style="background-color: white;border: 1px solid #d3d3d3;float:left;">
													<a href="<?php echo $data['selectOneInfo'][0][$i]; ?>">
														<i class="fab fa-facebook" style="line-height:50px;"></i>
														Facebook
													</a>
												</div>
											</div>
										<?php
									}elseif($i == 8){
										?>
											<div class="footer__widget__social">
												<div class="hero__search__phone__icon" style="background-color: white;border: 1px solid #d3d3d3;float:left;">
													<a href="<?php echo $data['selectOneInfo'][0][$i]; ?>">
														<i class="fab fa-twitter" style="line-height:50px;"></i>
														Facebook
													</a>
												</div>
											</div>
										<?php
									}elseif($i == 9){
										?>
											<div class="footer__widget__social">
												<div class="hero__search__phone__icon" style="background-color: white;border: 1px solid #d3d3d3;float:left;">
													<a href="<?php echo $data['selectOneInfo'][0][$i]; ?>">
														<i class="fab fa-facebook-plus-g" style="line-height:50px;"></i>
														Facebook
													</a>
												</div>
											</div>
										<?php
									}elseif($i == 10){
										?>
											<div class="footer__widget__social">
												<div class="hero__search__phone__icon" style="background-color: white;border: 1px solid #d3d3d3;float:left;">
													<a href="<?php echo $data['selectOneInfo'][0][$i]; ?>">
														<i class="fab fa-youtube" style="line-height:50px;"></i>
														Facebook
													</a>
												</div>
											</div>
										<?php
									}elseif($i == 11){
										?>
											<div class="footer__widget__social">
												<div class="hero__search__phone__icon" style="background-color: white;border: 1px solid #d3d3d3;float:left;">
													<a href="<?php echo $data['selectOneInfo'][0][$i]; ?>">
														<i class="fab fa-pinterest" style="line-height:50px;"></i>
														Facebook
													</a>
												</div>
											</div>
										<?php
									}elseif($i == 12){
										?>
											<div class="footer__widget__social">
												<div class="hero__search__phone__icon" style="background-color: white;border: 1px solid #d3d3d3;float:left;">
													<a href="<?php echo $data['selectOneInfo'][0][$i]; ?>">
														<i class="fab fa-instagram" style="line-height:50px;"></i>
														Facebook
													</a>
												</div>
											</div>
										<?php
									}else{
										?>
											<div class="footer__widget__social">
												<div class="hero__search__phone__icon" style="background-color: white;border: 1px solid #d3d3d3;float:left;">
													<a href="tel:<?php echo $data['selectOneInfo'][0][1]; ?>">
														<i class="fas fa-phone" style="line-height:50px;"></i>
														Facebook
													</a>
												</div>
											</div>
										<?php
									}
								}
							}
						?>

						
					</div>
				</div> 
				<div class="col-lg-3 col-md-3">
					<div class="footer__widget">
						<h6>VỀ CHÚNG TÔI</h6>
						<?php echo $data['selectOneInfo'][0][15]; ?>
					</div>
				</div>
			</div>
			<div class="row">
<div class="col-lg-12">
<div class="footer__copyright">
<div class="footer__copyright__text"><p>
Copyright ©<script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script>document.write(new Date().getFullYear());</script>2021 All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
</p></div>
</div>
</div>
</div>
		</div>
	</footer>


	
	<script src="public/Customer/js/bootstrap.min.js"></script>
	<script src="public/Customer/js/jquery.nice-select.min.js"></script>
	<script src="public/Customer/js/jquery-ui.min.js"></script>
	<script src="public/Customer/js/jquery.slicknav.js"></script>
	<script src="public/Customer/js/mixitup.min.js"></script>
	<script src="public/Customer/js/owl.carousel.min.js"></script>
	<script src="public/Customer/js/main.js"></script>
	<script src="public/Admin/sweetalert2/sweetalert2.all.min.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		var url = window.location.href;  	

	    for(var i = 1;i <= $("div.pagination.pagination-style-three.m-t-20 a.page-link").length; i++){
            
            var addactive = url.indexOf($("div.pagination.pagination-style-three.m-t-20 a.page-link:nth-child("+i+")").attr("href"));

            if(addactive > 0){
                $("div.pagination.pagination-style-three.m-t-20 a").css({ 'background-color' : '', 'color' : '' });
                $("div.pagination.pagination-style-three.m-t-20 a.page-link:nth-child("+i+")").css('background','#ff6407').css('color','white');
            }
            
        } 
	window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>