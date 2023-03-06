
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
								<h5><?php echo $data['selectOne'][0][1]; ?></h5>
								<span><?php echo $data['selectOne'][0][4]; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<section class="hero">
<div class="container">
<div class="row">
<div class="col-lg-12">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  		<?php 
				$count = 0;
					foreach($data['getAllSlider'] as $value) {
						if($value['status'] == 1){
				?>
   			 <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $value['id'] ?>" class="<?php 
              if($count==0){
                echo "active";  
              }
              else{
                  echo "";
              }
          ?>"></li>
    				<?php
				$count++;
						}
					}
				?>

  </ol>
  <div class="carousel-inner">
    
				<?php 
				$count = 0;
					foreach($data['getAllSlider'] as $value) {
						if($value['status'] == 1){
				?>
					<div class="carousel-item <?php 
              if($count==0){
                echo "active";  
              }
              else{
                  echo " ";
              }
          ?>">
		      <div class="hero__item set-bg" data-setbg="uploads/<?php echo $value['image']; ?>" style="background-image: url('uploads/<?php echo $value['image']; ?>');position:relative;">
		      				<div class="hero__text text-white" style="<?php echo $value['style']; ?>">
									<span style="color: #7fad39;"><?php echo $value['TieuDePhu']; ?></span>
									<h2 class="text-white"><?php echo $value['TieuDeChinh']; ?></h2>
									<p class="text-white"><?php echo $value['description']; ?></p>
									<a class="text-white primary-btn" href="<?php echo $value['link']; ?>">SHOP NOW</a>
									</div>
								</div>
					    </div>
				<?php
				$count++;
						}
					}
				?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


		</div>
	</div>
</div>
</section>
	<!-- </section>	 -->

	<section class="featured spad" style="margin-top: 35px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Tất cả sản phẩm</h2>
					</div>
				</div>
			</div>
			<div class="row featured__filter">
				<?php 
				foreach($data['proSold'] as $value) {
					?>
					<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
						<div class="featured__item">
							<div class="featured__item__pic set-bg" data-setbg="uploads/<?php echo $value['HinhAnhSP']; ?>">
								<ul class="featured__item__pic__hover">
									<li><a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value['ID'].".html"; ?>"><i class="fas fa-info" style="line-height: 39px;"></i></a></li>
									<li>
										<button type="button" class="addtocart" onclick="addtocart(<?php echo $value['ID']; ?>)">
											<i class="fas fa-shopping-cart" style="line-height: 39px;"></i>
										</button>
									</li>
								</ul>
							</div>
							<div class="featured__item__text">
								<h6><a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value['ID'].".html"; ?>"><?php echo $value['Tensp']; ?></a></h6>
								<h5><?php echo number_format($value['Gia'], 0, '', ',')." VNĐ"; ?></h5>
							</div>
						</div>
					</div>
					<?php
				}
				?>

			</div>
			<a href="shop.html" class="watch-add">Xem thêm sản phẩm</a>
		</div>
	</section>
	<script type="text/javascript">
		function addtocart(id){

			$.post('ajax/customer/addToCart.php',{ 'masanpham':id }, function(data) {
					
				// console.log(data);
				item = data.split("+");

				$("#quantity").text(item[0]);

				$("#tongcong").text(item[1]);

				$("#tongcong-1").text(item[1]);

				$("#listTable").load("index.php #listTable");

				$("#quantity-mobile").load("index.php #quantity-mobile");

			});

		}		
	</script>
	<style type="text/css">
		.watch-add{
			display: block;
			background-color: #7fad39;
			background: #7fad39;
			padding: 10px 25px 10px 31px;
			cursor: pointer;
			border: none;
			color: white;
			font-size: 15px;
			font-weight: 700;
			color: #ffffff;
			margin: auto;
			width: 209px;
		}
	</style>
	<section class="featured spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Sản phẩm bán chạy</h2>
					</div>
				</div>
			</div>
			<div class="row featured__filter">
				<?php 
				foreach($data['prTop'] as $value) {
					?>
					<div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
						<div class="featured__item">
							<div class="featured__item__pic set-bg" data-setbg="uploads/<?php echo $value['HinhAnhSP']; ?>">
								<ul class="featured__item__pic__hover">
									<li><a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value['ID'].".html"; ?>"><i class="fas fa-info" style="line-height: 39px;"></i></a></li>
									<li>
										<button type="button" class="addtocart" onclick="addtocart(<?php echo $value['ID']; ?>)">
											<i class="fas fa-shopping-cart" style="line-height: 39px;"></i>
										</button>
									</li>
								</ul>
							</div>
							<div class="featured__item__text">
								<h6><a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value['ID'].".html"; ?>"><?php echo $value['Tensp']; ?></a></h6>
								<h5><?php echo number_format($value['Gia'], 0, '', ',')." VNĐ"; ?></h5>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<a href="shop.html" class="watch-add">Xem thêm sản phẩm</a>
		</div>
	</section>

	<section class="spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title from-blog__title">
						<h2>Bài viết hay</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php 
				foreach($data['get3New'] as $value) {
					?>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="index.php?controller=new&idnew=<?php echo $value['ID']; ?>" title="">
						<div class="blog__item">
							<div class="blog__item__pic">
								<img src="ImageNew/<?php echo $value['HinhAnh']; ?>" alt="">
							</div>
							<div class="blog__item__text">
								<ul>
									<li><i class="fa fa-calendar-o"></i><?php echo $value['Created_time']; ?></li>
								</ul>
								<h5><a href="index.php?controller=new&idnew=<?php echo $value['ID']; ?>"><?php echo $value['TieuDe']; ?></a></h5>
								<p><?php echo $value['MoTaNgan']; ?></p>
							</div>
						</div>
						</a>
					</div>
					<?php
				}
				?>
			</div>
			<a href="new.html" class="watch-add">Xem thêm bài viết</a>
		</div>
	</section>