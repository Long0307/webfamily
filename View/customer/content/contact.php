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
										<li><a href="index.php?controller=shop&iddanhmuc=<?php echo $value['ID']; ?>">
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
<section class="breadcrumb-section set-bg" data-setbg="public/logo/Banner_danh_m_c-DCHT.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Liên hệ với chúng tôi</h2>
					<div class="breadcrumb__option">
						<a href="./index.html">Home</a>
						<span>Liên hệ với chúng tôi</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="contact spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
				<span class="fas fa-phone"></span>
				<h4>Phone</h4>
				<p><?php echo $data['selectOne'][0][1]; ?></p>
			</div>
		</div>
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
					<span class="fas fa-map-marked-alt"></span>
					<h4>Address</h4>
					<p><?php echo $data['selectOne'][0][2]; ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
					<span class="far fa-clock"></span>
					<h4>Open time</h4>
					<p><?php echo $data['selectOne'][0][3]; ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 text-center">
				<div class="contact__widget">
					<span class="far fa-envelope"></span>
					<h4>Email</h4>
					<p><?php echo $data['selectOne'][0][4]; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="map">
<iframe src="<?php echo $data['selectOne'][0][13]; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
<div class="map-inside">
<i class="icon_pin"></i>
<div class="inside-widget">
<ul>
<li>Phone: <?php echo $data['selectOne'][0][1]; ?></li>
<li>Add: <?php echo $data['selectOne'][0][2]; ?></li>
</ul>
</div>
</div>
</div>
<div class="contact-form spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="contact__form__title">
					<h2>Liên hệ trực tiếp</h2>
				</div>
			</div>
		</div>
		<?php
		    if(isset($data['success'])){
		        echo $data['success'];
		    }

		  ?>
		<form action="" method="post">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<input type="text" name="name" placeholder="Tên của bạn">
				</div>
				<div class="col-lg-6 col-md-6">
					<input type="text" name="email" placeholder="Email của bạn">
				</div>
				<div class="col-lg-12 text-center">
					<textarea name="content" placeholder="Nội dung"></textarea>
					<button type="submit" name="sendmess" class="site-btn">GỬI TIN</button>
				</div>
			</div>
		</form>
	</div>
</div>