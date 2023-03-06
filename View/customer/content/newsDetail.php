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
<section class="blog-details-hero set-bg" data-setbg="public/logo/Banner_danh_m_c-DCHT.jpg" style="margin-top: 35px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="blog__details__hero__text">
					<h2>

						<?php

						echo $data['selectOne'][0]['TieuDe'];

						?>

					</h2>
					<ul>
						<li style="font-size: 28px;">	
							<?php

							echo $data['selectOne'][0]['Created_time'];

							?>		
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="blog-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-5 order-md-1 order-2">
				<div class="blog__sidebar">
					<div class="blog__sidebar__search">
						<form action="#">
							<input type="text" placeholder="Search...">
							<button type="submit"><span class="icon_search"></span></button>
						</form>
					</div>

					<div class="blog__sidebar__item">
						<h4>Bài viết mới nhất</h4>
						<div class="blog__sidebar__recent">
								<?php 
								foreach($data['selectNewsSort'] as $value) {
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
			<div class="col-lg-8 col-md-7 order-md-1 order-1">
				<br><br>
				<?php

				echo $data['selectOne'][0]['NoiDung'];

				?>


			</div>
		</div>
	</div>
</section>

