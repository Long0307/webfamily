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
						$currentPageUrl = $_SERVER["REQUEST_URI"];
						foreach($data['selectAllCate'] as $value) {
							?>
							<li class="<?php if(strpos(trim($currentPageUrl), 'shop/'.$value['ID']."/".vn_to_str($value['TenDanhMuc']).".html") > 0){ echo "active"; }; ?>">
								<a href="shop/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TenDanhMuc']).".html"; ?>" class="<?php if(strpos(trim($currentPageUrl), 'shop/'.$value['ID']."/".vn_to_str($value['TenDanhMuc']).".html") > 0){ echo "active"; }; ?>">
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
						<h2>BÀI VIẾT</h2>
						<div class="breadcrumb__option">
							<a href="./index.html">Home</a>
							<span>BÀI VIẾT</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="blog spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-5">
					<div class="blog__sidebar">
						<div class="blog__sidebar__search">
							<form action="" method="post">
								<input type="text" name="text_search_blog" placeholder="Search...">
								<button type="submit" name="search_blog"><i clas="fas fa-search"></i></button>
							</form>
						</div>

						<div class="blog__sidebar__item">
							<h4>BÀI VIẾT MỚI NHẤT</h4>
							<div class="blog__sidebar__recent">
								<?php 
								foreach($data['selectNew'] as $value) {
									?>
									<a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>" class="blog__sidebar__recent__item">
										<div class="blog__sidebar__recent__item__pic">
											<img src="ImageNew/<?php echo $value['HinhAnh']; ?>" style="width:120px;height:80px;" alt="">
										</div>
										<div class="blog__sidebar__recent__item__text">
											<h6><?php echo $value['TieuDe']; ?></h6>
											<span><?php echo $value['Created_time']; ?></span>
										</div>
									</a>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-8 col-md-7">
					<div class="row">
						<?php

						if(isset($data['keyword'])){
							foreach ($data['keyword'] as $key => $value) {
								?>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>">
										<div class="blog__item">
											<div class="blog__item__pic">
												<img src="ImageNew/<?php echo $value['HinhAnh']; ?>" style="width: 100%;height: 35%;" alt="">
											</div>
											<div class="blog__item__text">
												<ul>
													<li><i class="far fa-calendar-alt"></i> <?php echo $value['Created_time']; ?></li>
												</ul>
												<h5><a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>"><?php echo $value['TieuDe']; ?></a></h5>
												<p><?php echo $value['MoTaNgan']; ?></p>
												<a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
											</div>
										</div>
									</a>
								</div>
								<?php
							}
						}else{

						if(!isset($_GET['trang'])){
							$i = 0;
							foreach($data['selectNew'] as $value) {
								$i++;
								?>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>">
										<div class="blog__item">
											<div class="blog__item__pic">
												<img src="ImageNew/<?php echo $value['HinhAnh']; ?>" style="width: 100%;height: 35%;" alt="">
											</div>
											<div class="blog__item__text">
												<ul>
													<li><i class="far fa-calendar-alt"></i> <?php echo $value['Created_time']; ?></li>
												</ul>
												<h5><a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>"><?php echo $value['TieuDe']; ?></a></h5>
												<p><?php echo $value['MoTaNgan']; ?></p>
												<a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
											</div>
										</div>
									</a>
								</div>
								<?php
							}
						}else{
							$i = 0;
							foreach($data['pagiNew'] as $value) {
								$i++;
								?>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>">
										<div class="blog__item">
											<div class="blog__item__pic">
												<img src="ImageNew/<?php echo $value['HinhAnh']; ?>" style="width: 100%;height: 35%;" alt="">
											</div>
											<div class="blog__item__text">
												<ul>
													<li><i class="far fa-calendar-alt"></i> <?php echo $value['Created_time']; ?></li>
												</ul>
												<h5><a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>"><?php echo $value['TieuDe']; ?></a></h5>
												<p><?php echo $value['MoTaNgan']; ?></p>
												<a href="new/<?php echo $value['ID']; ?>/<?php echo vn_to_str($value['TieuDe']).".html"; ?>" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
											</div>
										</div>
									</a>
								</div>
								<?php
							}
						}
					}
						?>
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
						<div class="pagination pagination-style-three m-t-20"> 
							<?php
							$total = count($data['selectAll']);
							$a = ceil($total/12);
							if(isset($_GET['trang'])){
								if($_GET['trang'] < 2){
									echo "";
								}else{
									echo '<a class="page-link" href="index.php?controller=new&trang='.($_GET['trang']-1).'">Prev</a>';
								}

								echo '<a class="page-link" href="index.php?controller=new&trang=1">Trand đầu</a>';

								if(($_GET['trang'] - 3) > 0){
									for($b = $_GET['trang'] - 3; $b <= $_GET['trang'] + 3;$b++){

										if(($b > $b - 3) && ($b < $b + 3)){
											if($b > $a) {
												break;
											}
											echo '<a class="page-link" href="index.php?controller=new&trang='.$b.'">'.$b.'</a>';
										}

									}
								}
								else{

									for($b = 1; $b <= 4;$b++){

										if(($b > $b - 3) && ($b < $b + 3)){
											echo '<a class="page-link" href="index.php?controller=new&trang='.$b.'">'.$b.'</a>';
										}

									}
								}

								echo '<a class="page-link" href="index.php?controller=new&trang='.$a.'">Trang cuối</a>';

								if(isset($_GET['trang'])){
									if($_GET['trang'] < ($a - 2)){
										echo '<a class="page-link" href="index.php?controller=new&trang='.($_GET['trang']+1).'">Next</a>';
									}
								}

							}else{
								for($b = 1; $b <= 4;$b++){

									if(($b > $b - 3) && ($b < $b + 3)){
										echo '<a class="page-link" href="index.php?controller=new&trang='.$b.'">'.$b.'</a>';
									}

								}

								echo '<a class="page-link" href="index.php?controller=new&trang=2">Next</a>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
