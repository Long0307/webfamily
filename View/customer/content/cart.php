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
	<style>
		input[type=number] {
			/*for absolutely positioning spinners*/
			position: relative; 
			padding: 5px;
			padding-right: 25px;
		}

		input[type=number]::-webkit-inner-spin-button,
		input[type=number]::-webkit-outer-spin-button {
			opacity: 1;
		}

		input[type=number]::-webkit-outer-spin-button, 
		input[type=number]::-webkit-inner-spin-button {
			-webkit-appearance: inner-spin-button !important;
			width: 25px;
			position: absolute;
			top: 0;
			right: 0;
			height: 100%;
		}
	</style>
	<section class="breadcrumb-section set-bg" data-setbg="public/logo/Banner_danh_m_c-DCHT.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2>Shopping Cart</h2>
						<div class="breadcrumb__option">
							<a href="./index.html">Home</a>
							<span>Shopping Cart</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="shoping-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shoping__cart__table">
						<table id="body_table">
							<thead>
								<tr>
									<th class="shoping__product">Ảnh và tên sản phẩm</th>
									<th>Giá</th>
									<th>Số lượng</th>
									<th>Tổng tiền</th>
									<th></th>
								</tr>
							</thead>
							<tbody">
							<?php
							$subtotal = 0;
							$total = 0;
							if(isset($_SESSION['cart'])){
								$cart = $_SESSION['cart'];

								foreach ($cart as $key => $value) {
									$subtotal = (int)$value['quantity'] * (int)$value['price-new'];
									$total += $subtotal;
									?>
									<tr>
										<td class="shoping__cart__item">
											<img src="uploads/<?php echo $value['image']; ?>" width="70px" alt="">
											<h5><?php echo $value['name']; ?></h5>
										</td>

										<td class="shoping__cart__price">
											<?php echo number_format((int)$value['price-new'], 0, '', ',')."đ"; ?>
										</td>
										<td class="shoping__cart__quantity">
											<div class="quantity">
												<input type="number" style="width: 120px;height: 60px;text-align: center;" id="update_<?php echo $key; ?>" value="<?php echo $value['quantity']; ?>" onchange="moreandless(<?php echo $key; ?>)">	
											</div>
											
										</td>
										<td class="shoping__cart__total">
											<?php echo number_format($subtotal, 0, '', ',')."đ"; ?>
										</td>
										<td class="shoping__cart__item__close">
											<i class="fas fa-trash-alt" style="color: red;font-size: 20px;" onclick="deleteCart(<?php echo $key; ?>)"></i>
										</td>
									</tr>
									<?php
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script type="text/javascript">

			function moreandless(id){	

				quantity = $("#update_"+id).val();

				$.post("ajax/customer/moreandless.php",{ 'masanpham':id,'quantity':quantity },function(data){

					$("#listTable").load("index.php #listTable");

					$("#tongcong-1").load("index.php #tongcong-1");

					$("#body_table").load("index.php?controller=cart #body_table");

					$("#quantity").load("index.php #quantity");


				});
			}

			function deleteCart(id){	

				$.post("ajax/customer/deleteCart.php",{ 'masanpham':id,'quantity':0 },function(data,error){

					$("#listTable").load("index.php #listTable");

					$("#tongcong-1").load("index.php #tongcong-1");

					$("#body_table").load("index.php?controller=cart #body_table");

					$("#quantity").load("index.php #quantity");


				});

			}
		</script>
		<div class="row">
			<div class="col-lg-6">
				<div class="shoping__cart__btns">
					<a href="index.php?controller=shop" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
				</div>
			</div>
			<div class="col-lg-6" style="margin-top: 0px;">
				<div class="shoping__checkout">
					<h5>Tổng tiền trong giỏ hàng</h5>
					<ul>
						<li>Thành tiền <span><?php echo number_format($total, 0, '', ',')."đ"; ?></span></li>
					</ul>
					<a href="index.php?controller=order" class="primary-btn">TIẾN HÀNH THANH TOÁN</a>
				</div>
			</div>
		</div>
	</div>
</section>
