<section class="hero hero-normal">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="hero__categories">
					<div class="hero__categories__all">
						<i class="fas fa-bars"></i>
						<span style="font-size: 15px;">DANH MỤC SẢN PHẨM</span>
					</div>
					<ul>
						<?php

						foreach($data['selectAll'] as $value) {
							?>
							<li><a href="shop/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TenDanhMuc']).".html"; ?>">
								<?php echo $value['TenDanhMuc']; ?></a></li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="hero__search">
						<div class="hero__search__form">
							<form action="" method="post">
								<div class="hero__search__categories">
									Tìm kiếm bất kỳ
								</div>
								<input type="text" name="text-search-header" placeholder="Tìm kiếm..">
								<button type="submit" name="search-header" class="site-btn">SEARCH</button>
							</form>
						</div>
						<div class="hero__search__phone">
							<div class="hero__search__phone__icon">
								<i class="fas fa-phone" style="line-height:50px;"></i>
							</div>
							<div class="hero__search__phone__text">
								<h5><?php echo $data['selectOneInfo'][0][1]; ?></h5>
								<span><?php echo $data['selectOneInfo'][0][4]; ?></span>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="breadcrumb-section set-bg" data-setbg="public/logo/Banner_danh_m_c-DCHT.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>PHL.COM CỬA HÀNG</h2>
						<div class="breadcrumb__option">
							<a href="./index.html">Home</a>
							<span>CỬA HÀNG</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="product spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-5">
					<div class="sidebar">
						<div class="sidebar__item sidebar__item_mobile">
							<h4>Danh mục sản phẩm</h4>
							<ul>
								<?php		
								$currentPageUrl = $_SERVER["REQUEST_URI"];

								foreach($data['selectAll'] as $value) {
									?>
									<li><a href="shop/<?php echo $value['ID']; ?>"  style="<?php if(strpos(trim($currentPageUrl),'index.php?controller=shop&idlsp='.$value['ID'])){ echo 'color: #7fad39;'; } ?>"><?php echo $value['TenDanhMuc']; ?></a></li>
									<?php
								}
								?>
							</ul>
						</div>

						<div class="sidebar__item">
							<div class="latest-product__text">
								<h4>Sản phẩm bán chạy</h4>
								<div class="latest-product__slider owl-carousel">
									<div class="latest-prdouct__slider__item">
										<?php 
										foreach($data['prTop'] as $value) {
											?>
											<a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value[0].".html"; ?>" class="latest-product__item">
												<div class="latest-product__item__pic">
													<img src="uploads/<?php echo $value['HinhAnhSP']; ?>" style="width:70px;height:80px;" alt="">
												</div>
												<div class="latest-product__item__text">
													<h6><?php echo $value['Tensp']; ?></h6>
													<span><?php echo number_format($value['Gia'], 0, '', ',')." VNĐ"; ?></span>
												</div>
											</a>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-7">
					<div class="product__discount" style="padding-bottom: 0px;">
						<div class="section-title product__discount__title">
							<h2>
								<?php
								if(isset($_GET['idlsp'])){
									
									foreach ($data['selectOne'] as $value) {
										echo $value['TenDanhMuc']."  (".$data['proSoldSame'].")";
									}

								}else{
									echo "Tất cả sản phẩm"."  (".$data['proSoldSame'].")";
								}
								?>
							</h2>
						</div>

					</div>

					<div class="row">
						<?php

						if(isset($_GET['idlsp'])){

							if(!isset($_GET['trang'])){
								$i = 0;
								foreach($data['selectProductSameCate'] as $value) {
									$i++;
									?>
									<div class="col-lg-4 col-md-6 col-sm-6">
										<div class="product__item">
											<div class="product__item__pic featured__item__pic set-bg" data-setbg="uploads/<?php echo $value['HinhAnhSP']; ?>">
												<ul class="product__item__pic__hover">
													<li>
														<a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value[0].".html"; ?>"><i class="fas fa-info" style="line-height: 39px;"></i>
														</a>
													</li>
													<li>
														<button type="button" class="addtocart" onclick="addtocart(<?php echo $value[0]; ?>)">
															<i class="fas fa-shopping-cart" style="line-height: 39px;"></i>
														</button>
													</li>
												</ul>
											</div>
											<div class="product__item__text">
												<h6><a href="#"><?php echo $value['Tensp']; ?></a></h6>
												<h5><?php echo number_format($value['Gia'], 0, '', ',')." VNĐ"; ?></h5>
											</div>
										</div>
									</div>
									<?php
								}
							}else{
								$i = 0;
								foreach($data['pagiProSameCate'] as $value){
									$i++;
									?>
									<div class="col-lg-4 col-md-6 col-sm-6">
										<div class="product__item">
											<div class="product__item__pic featured__item__pic set-bg" data-setbg="uploads/<?php echo $value['HinhAnhSP']; ?>">
												<ul class="product__item__pic__hover">
													<li>
														<a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value[0].".html"; ?>">
															<i class="fas fa-info" style="line-height: 39px;"></i>
														</a>
													</li>
													<li>
														<button type="button" class="addtocart" onclick="addtocart(<?php echo $value[0]; ?>)">
															<i class="fas fa-shopping-cart" style="line-height: 39px;"></i>
														</button>
													</li>
												</ul>
											</div>
											<div class="product__item__text">
												<h6><a href="#"><?php echo $value['Tensp']; ?></a></h6>
												<h5><?php echo number_format($value['Gia'], 0, '', ',')." VNĐ"; ?></h5>
											</div>
										</div>
									</div>
									<?php
								}
							}

						}else{
							if(!isset($_GET['trang'])){
								$i = 0;
								foreach($data['selectProduct'] as $value) {
									$i++;
									?>
									<div class="col-lg-4 col-md-6 col-sm-6">
										<div class="product__item">
											<div class="product__item__pic featured__item__pic set-bg" data-setbg="uploads/<?php echo $value['HinhAnhSP']; ?>">
												<ul class="product__item__pic__hover">
													<li>
														<a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value[0].".html"; ?>">
															<i class="fas fa-info" style="line-height: 39px;"></i>
														</a>
													</li>
													<li>
														<button type="button" class="addtocart" onclick="addtocart(<?php echo $value[0]; ?>)">
															<i class="fas fa-shopping-cart" style="line-height: 39px;"></i>
														</button>
													</li>
												</ul>
											</div>
											<div class="product__item__text">
												<h6><a href="#"><?php echo $value['Tensp']; ?></a></h6>
												<h5><?php echo number_format($value['Gia'], 0, '', ',')." VNĐ"; ?></h5>
											</div>
										</div>
									</div>
									<?php
								}
							}else{
								$i = 0;
								foreach($data['pagiPro'] as $value) {
									$i++;
									?>
									<div class="col-lg-4 col-md-6 col-sm-6">
										<div class="product__item">
											<div class="product__item__pic featured__item__pic set-bg" data-setbg="uploads/<?php echo $value['HinhAnhSP']; ?>">
												<ul class="product__item__pic__hover">
													<li>
														<a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value[0].".html"; ?>">
															<i class="fas fa-info" style="line-height: 39px;"></i>
														</a>
													</li>
													<li>
														<button type="button" class="addtocart" onclick="addtocart(<?php echo $value[0]; ?>)">
															<i class="fas fa-shopping-cart" style="line-height: 39px;"></i>
														</button>
													</li>
												</ul>
											</div>
											<div class="product__item__text">
												<h6><a href="#"><?php echo $value['Tensp']; ?></a></h6>
												<h5><?php echo number_format($value['Gia'], 0, '', ',')." VNĐ"; ?></h5>
											</div>
										</div>
									</div>
									<?php
								}
							}
						}

						?>
					</div>
					<style>
						.pagination-style-three a { 
							padding: 5px 15px; 
							background: #ffffff; 
							color: #ff6407; 
							border-radius: 25px;
							box-shadow: 0px 5px 10px 0px rgba(0,0,0,.1);
							margin: 0px 5px;
						}

						.pagination-style-three a.selected, .pagination-style-three a:hover, .pagination-style-three a:active, .pagination-style-three a:focus { background: #ff6407;color: white; }

					</style>
					<script type="text/javascript">
						function addtocart(id){

							$.post('ajax/customer/addToCart.php',{ 'masanpham':id }, function(data) {
									
								item = data.split("+");

								$("#quantity").text(item[0]);

								$("#tongcong").text(item[1]);

								$("#tongcong-1").text(item[1]);

								$("#listTable").load("index.php #listTable");

								$("#quantity-mobile").load("index.php #quantity-mobile");

							});

						}		
					</script>
					<div class="pagination pagination-style-three m-t-20"> 
						<?php

						if(isset($_GET['idlsp'])){

							$total = count($data['selectAllProductSameCate']);
							$a = ceil($total/12);
							if(isset($_GET['trang'])){
								if($_GET['trang'] < 2){
									echo "";
								}else{
									echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang='.($_GET['trang']-1).'">Prev</a>';
								}

								echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang=1">Trand đầu</a>';

								if(($_GET['trang'] - 3) > 0){
									for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

										if(($b > $b - 3) && ($b < $b + 3)){
											if($b > $a) {
												break;
											}
											echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang='.$b.'">'.$b.'</a>';
										}

									}
								}
								else{

									for($b = 1; $b <= $a;$b++){

										if(($b > $b - 3) && ($b < $b + 3)){
											echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang='.$b.'">'.$b.'</a>';
										}

									}
								}

								echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang='.$a.'">Trang cuối</a>';

								if(isset($_GET['trang'])){
									if($_GET['trang'] < ($a - 2)){
										echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang='.($_GET['trang']+1).'">Next</a>';
									}
								}

							}else{
								for($b = 1; $b <= $a;$b++){

									if(($b > $b - 3) && ($b < $b + 3)){
										echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang='.$b.'">'.$b.'</a>';
									}

								}

								echo '<a class="page-link" href="index.php?controller=shop&idlsp='.($_GET['idlsp']).'&trang=2">Next</a>';
							}

						}else{

							$total = count($data['selectAllProduct']);
							$a = ceil($total/12);
							if(isset($_GET['trang'])){

								if(($_GET['trang'] - 3) > 0){
									for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

										if(($b > $b - 3) && ($b < $b + 3)){
											if($b > $a) {
												break;
											}
											echo '<a class="page-link" href="index.php?controller=shop&trang='.$b.'">'.$b.'</a>';
										}

									}
								}
								else{

									for($b = 1; $b <= 6;$b++){

										if(($b > $b - 3) && ($b < $b + 3)){
											echo '<a class="page-link" href="index.php?controller=shop&trang='.$b.'">'.$b.'</a>';
										}

									}


								}

								echo '<a class="page-link" href="index.php?controller=shop&trang='.$a.'">Trang cuối</a>';

							}else{
								for($b = 1; $b <= 6;$b++){

									if(($b > $b - 3) && ($b < $b + 3)){
										echo '<a class="page-link" href="index.php?controller=shop&trang='.$b.'">'.$b.'</a>';
									}

								}

								echo '<a class="page-link" href="index.php?controller=shop&trang=2">Next</a>';
							}

						}

						?>
					</div>
				</div>
			</div>
		</div>
		
	</section>
