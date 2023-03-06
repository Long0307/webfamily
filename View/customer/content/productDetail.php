<style>
.content-item {
    padding:30px 0;
	background-color:#FFFFFF;
}

.content-item.grey {
	background-color:#F0F0F0;
	padding:50px 0;
	height:100%;
}

.content-item h2 {
	font-weight:700;
	font-size:35px;
	line-height:45px;
	text-transform:uppercase;
	margin:20px 0;
}

.content-item h3 {
	font-weight:400;
	font-size:20px;
	color:#555555;
	margin:10px 0 15px;
	padding:0;
}

.content-headline {
	height:1px;
	text-align:center;
	margin:20px 0 70px;
}

.content-headline h2 {
	background-color:#FFFFFF;
	display:inline-block;
	margin:-20px auto 0;
	padding:0 20px;
}

.grey .content-headline h2 {
	background-color:#F0F0F0;
}

.content-headline h3 {
	font-size:14px;
	color:#AAAAAA;
	display:block;
}

#comments {
    box-shadow: 0 -1px 6px 1px rgba(0,0,0,0.1);
	background-color:#FFFFFF;
}

#comments .btn {
	margin-top:7px;
}

#comments form fieldset {
	clear:both;
}

#comments form textarea {
	height:70px;
}

#comments .media {
	border-top:1px dashed #DDDDDD;
	padding:20px 0;
	margin:0;
}

#comments .media > .pull-left {
    margin-right:20px;
}

#comments .media img {
	max-width:90px;
}

#comments .media h4 {
	margin:0 0 10px;
}

#comments .media h4 span {
	font-size:14px;
	float:right;
	color:#999999;
}

#comments .media p {
	margin-bottom:15px;
	text-align:justify;
}

#comments .media-detail {
	margin:0;
}

#comments .media-detail li {
	color:#AAAAAA;
	font-size:12px;
	padding-right: 10px;
	font-weight:600;
}

#comments .media-detail a:hover {
	text-decoration:underline;
}

#comments .media-detail li:last-child {
	padding-right:0;
}

#comments .media-detail li i {
	color:#666666;
	font-size:15px;
	margin-right:10px;
}
</style>
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
									foreach($data['selectAll'] as $value) {
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
					<h2>Infomation product</h2>
					<div class="breadcrumb__option">
						<a href="./index.html">Home</a>
						<span>Infomation product</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> 


<section class="product-details spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="product__details__pic">
					<div class="product__details__pic__item">
						<img class="product__details__pic__item--large" src="uploads/<?php echo $data['productDetail'][0]['HinhAnhSP']; ?>" alt="">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="product__details__text">
					<h3><?php echo $data['productDetail'][0]['Tensp']; ?></h3>
					
					<div class="product__details__price"><?php echo number_format($data['productDetail'][0]['Gia'], 0, '', ',')." VNĐ"; ?></div>
					<div class="product__details__quantity">
						<div class="quantity">
							<div class="pro-qty">
								<input type="text" id="quantity_<?php echo $_GET['idsp']; ?>" min="0" value="0">
							</div>
						</div>
					</div>
					<button type="button" class="primary-btn" onclick="changequantity(<?php echo $_GET['idsp']; ?>);">ADD TO CARD</button>
					<script type="text/javascript">
						function changequantity(id){
							quantity = $("#quantity_"+id).val();
							
							$.post('ajax/customer/addToCartForQuantity.php',{ 'masanpham':id,'quantity':quantity }, function(data) {

									item = data.split("+");

									$("#quantity").load("index.php #quantity");

									$("#tongcong-1").load("index.php #tongcong-1");

									$("#listTable").load("index.php #listTable");

							})
						}
					</script>
					<ul>
						<li><b>Nhà sản xuất</b> <span><?php echo $data['productDetail'][0]['NhaSanXuat']; ?></span></li>
						<li><b>Chất liệu</b> <span><?php echo $data['productDetail'][0]['ChatLieu']; ?></span></li>
						<li><b>Xuất xứ</b> <span><?php echo $data['productDetail'][0]['XuatXu']; ?></span></li>
						<li><b>Số lượng còn lại</b> <span><?php echo $data['productDetail'][0]['SoLuongTon']; ?></span></li>
						<li><b>Số điện thoại </b> <span>0375 769 686</span></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="product__details__tab">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">Information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Comments</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tabs-1" role="tabpanel">
							<div class="product__details__tab__desc">
								<?php echo $data['productDetail'][0]['ThongTinSP']; ?>
							</div>
						</div>
						<div class="tab-pane" id="tabs-2" role="tabpanel">
							<div class="product__details__tab__desc">
								<section class="content-item" id="comments">
    <div class="container">   
    	<div class="row">
            <div class="col-sm-8" style="margin:auto;justify-content: center;display: flex;">  

				<div id="fb-root"></div>
				<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=306178000757282&autoLogAppEvents=1" nonce="F3iUa9kk"></script>
				<div class="fb-comments" data-href="https://phunghuulong.com/webfamily/index.php?controller=shop&idlsp=<?php echo $_GET['idlsp']; ?>&idsp=<?php echo $_GET['idsp']; ?>" data-width="" data-numposts="5"></div>
    
            </div>
        </div>
    </div>
</section>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>


<section class="related-product">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title related__product__title">
					<h2>Sản phẩm liên quan</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php 
			foreach($data['proSoldSame'] as $value) {
				?>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="product__item">
						<div class="product__item__pic featured__item__pic set-bg" data-setbg="uploads/<?php echo $value['HinhAnhSP']; ?>">
							<ul class="product__item__pic__hover">
								<li><a href="shop/<?php echo $value['IDDanhMuc']; ?>/<?php echo $value[0]; ?>/<?php echo vn_to_str($value['Tensp'])."-".$value[0].".html"; ?>"><i class="fas fa-info" style="line-height: 39px;"></i></a></li>
								<li><a href="#"><i class="fas fa-shopping-cart" style="line-height: 39px;"></i></a></li>
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
			?>
		</div>
	</div>
</section>

