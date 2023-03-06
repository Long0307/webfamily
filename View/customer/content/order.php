<?php

	if(!isset($_SESSION['current_user']) || !isset($_SESSION['current_info_user'])){

		header("location: ajax/customer/login.php");

	}

?>
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
					<h2>Thanh toán</h2>
					<div class="breadcrumb__option">
						<a href="index.php">Trang chủ</a>
						<span>Checkout</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="row">
	<div class="container">
		<section class="container checkout spad" style="background-color: #ffffff;">
			<div class="container">
				<div class="checkout__form">
					<h4>Chi tiết đặt hàng</h4>
					<?php
						if(isset($data['error'])){
							echo $data['error']['null'];
						}

						if(isset($data['success'])){
							echo $data['success']['success'];
						}

						if(isset($data['success_finish'])){
							echo $data['success_finish'];
						}
						// print_r($data['addressshow']);

					?>
					<form action="" method="post" enctype="multipart/form-data" id="let_hidden">
								<div class="container checkout__order" style="margin-bottom: 10px; padding-bottom: 15px;">
									<h5 style="color: #ee4d2d; margin-bottom:10px;"><i class="fa fa-map-marker" style="color: #ee4d2d;" aria-hidden="true"></i>Delivery address</h5>
									<?php
									foreach ($data['addressshow'] as $key => $value) {

											if($value['setdefault'] == 1){
												?>
												<span style="color:black; display: flex;"> 
													<strong style="margin-right: 15px; margin-top: 0px;"><?php echo $value['fullname']; ?>   (+84) <?php echo $value['phone']; ?></strong> 
													<p style="margin-right: 15px;margin-top: -3px;"><?php echo $value['addressgetproduct'].", ".$value['wards'].", ".$value['district'].", ".$value['city']; ?></p>  
													<button type="button" class="btn btn-outline-warning p-1" style="width: 66px;font-size: 12px;margin-right: 15px;margin-top: -3px;height: 26px;">Default</button>													
													<a type="button" onclick="return showedit(<?php echo $value['id']; ?>, <?php echo $value['id_customer']; ?>);" class="text-right">Edit</a> 
												</span>

												<?php
											}
										}
									?>
								</div>
							</br> 
			<script>
				function showedit(id, id_customer){
					document.getElementById('id02').style.display='block';
				}

				function showeditinfo(id, id_customer){
					document.getElementById('id01').style.display='block';
				}
			</script>

								<div class="container checkout__order">
									<h4>Đơn Hàng Của Bạn</h4>
									<div class="">
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
											<?php echo $value['quantity']; ?>
											</div>
											
										</td>
										<td class="shoping__cart__total">
											<?php echo number_format($subtotal, 0, '', ',')."đ"; ?>
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
										<div class="checkout__order__total">Thành tiền <span><?php
										echo number_format($total, 0, '', ',')."đ"; 
										?></span>
										</div>
										<div class="checkout__input" style="border-bottom: 1px solid #e1e1e1; padding-bottom: 20px;">
											<p>Ghi chú đơn hàng<span>*</span></p>	
											<input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="note">
										</div>

										<p>Sau khi thanh toán chúng tôi sẽ gửi thông tin đơn hàng về gmail của bạn</p><br>
										
										<div class="checkout__input__checkbox">
											<label for="paypal">
												Thanh toán khi nhận hàng
												<input type="checkbox" id="paypal" checked="checked">
												<span class="checkmark"></span>
											</label>
										</div>
										<button type="submit" name="order" class="site-btn">THANH TOÁN</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>

    <style>

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  /* position: relative; Stay in place */
  z-index: 9; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100vh; /* Full height */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

#id01 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100vh; /* Full height */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

#id02 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 99; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100vh; /* Full height */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

#id03 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 101; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100vh; /* Full height */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: -40px auto 15% auto;
    border: 1px solid #888;
    width: 40%;
	height: 100%; 
    padding: 22px;
	position: relative; /* Stay in place */
}

    </style>	
<div id="id02" class="modal">
  <form class="modal-content animate">
		<div class="container-fruid pb-3" style="border-bottom: 1px solid rgba(0,0,0,.09)">
				My address
			</div>
				<div class="private" style="display:block; overflow-x: hidden; overflow-y: scroll; width: 102%;">
					<?php
						(int) $check = 1;
						foreach ($data['addressshow'] as $key => $value) {
							?>
						<div class="container-fruid mt-3 pb-3" style="border-bottom: 1px solid rgba(0,0,0,.09)">
							<input type="hidden" name="sort" class="sort_<?php echo $value['id']; ?>" value="<?php echo $value['setdefault']; ?>">
							<div class="row">
							<div class="col-md-1 py-0">
							<div class="form-check form-check-inline">
							<?php
								if($value['setdefault'] == 1){
									echo '<input class="form-check-input setdefault_checK" type="radio" name="setdefault_radio"  id="setdefault_check_'.$check.'" value="'.$value['id'].'" checked>';
								}else{
									echo '<input class="form-check-input setdefault_check" type="radio" name="setdefault_radio"  id="setdefault_check_'.$check.'" value="'.$value['id'].'">';
								}
								?>
							</div>
							</div>
							<div class="col-md-8 py-0">
								<h6 style="float: left;"><?php echo $value['fullname']; ?> </h6><span class="ml-3 mb-2" style="color: rgba(0,0,0,.54)">| (+84) <?php echo $value['phone']; ?></span>
								<p class="pb-0"><?php echo $value['addressgetproduct']; ?></p>
								<p style="margin-top: -16px;"><?php echo $value['wards'].", ".$value['district'].", ".$value['city']; ?></p>
								<?php
								if($value['setdefault'] == 1){
									echo '<button type="button" class="btn btn-outline-warning p-1" style="margin-top: -16px;">Default</button>';
								}
								?>
							</div> 
							<div class="col-md-3 py-0">
								<button type="button" style="border:none; background: white; color: blue; margin-left: 60px;" onclick="return showeditinfo(<?php echo $value['id']; ?>, <?php echo $value['id_customer']; ?>);" class="text-right">Edit</button> 
							</div>
							</div>
						</div>
							<?php
							$check ++;
						}
					?>
				</div>
				<div class="visible-top" style="positive: absolute; top: 0;">
					<button type="button" class="btn btn-primary col-md-4 mt-3" onclick="return showAddNew(<?php echo $value['id']; ?>, <?php echo $value['id_customer']; ?>);">Thêm địa chỉ mới</button>
					<div class="row mt-3">
						<button type="button" class="btn btn-outline-dark col-md-3  ml-3"  onclick="return document.getElementById('id02').style.display='none';">Huỷ</button>
						<button type="button" class="btn btn-primary col-md-3 ml-3" onclick="return confirmDefault(<?php echo $value['id']; ?>,'setdefault');"  id="confirm" name="confirm">Xác nhận</button>
					</div>
				</div>
  </form>
  
</div>
<script>
	function confirmDefault(id,setdefault){

		// alert($('div.setdefault_check').is(':checked').val);

		for (let i = 1; i <= $('.setdefault_checK').length; i++) {
			
			if($("#setdefault_check_"+i).is(':checked')){
				
				id = $("#setdefault_check_"+i).val();

				$.post("index.php?controller=profile",{ 'id': id, 'setdefault': setdefault },function(data,error){

					$("#account-info").load(window.location.href + " #account-info > *");

					document.getElementById('id02').style.display='none';

					window.location.href = window.location.href;

				});

			}
		}

	}
	function showeditinfo(id, id_customer){
		document.getElementById('id01').style.display='block';
		$.post("ajax/customer/editinfouser.php",{ 'id': id, 'id_customer': id_customer },function(data,error){

			document.getElementById('id01').style.display='block';

			var cutout = data.split("+");

			console.log(cutout[0]);

			$("div#id01 input#code").val(id); 

			$("div#id01 input#code_customer").val(id_customer); 

			$("div#id01 input#fullname").val(cutout[0]); 

			$("div#id01 input#phone").val(cutout[1]); 

			$("div#id01 input#address").val(cutout[2]); 

			$("div#id01 input#province").val(cutout[3]); 

			$("div#id01 input#district").val(cutout[4]); 

			$("div#id01 input#ward").val(cutout[5]); 

			if($("div#id01 input#inlineRadio1").val() == cutout[6]){

				$("div#id01 input#inlineRadio1").prop('checked', true);

			}else if($("div#id01 input#inlineRadio2").val() == cutout[6]){

				$("div#id01 input#inlineRadio2").prop('checked', true);

			}

	});
	}

	function showAddNew(id, id_customer){
		document.getElementById('id03').style.display='block';
	}
</script>
<div id="id01" class="modal">
  
<form class="modal-content animate" action="" method="post">
	<div class="container-fruid pb-3" style="border-bottom: 1px solid rgba(0,0,0,.09)">
			Sửa địa chỉ
	</div>
    <input type="hidden" name="code" id="code" value="">
    <input type="hidden" name="code_customer" id="code_customer" value="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Full name</label>
      <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Fullname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone number</label>
      <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Địa chỉ nhận hàng</label>
    <input type="text" name="adđress" class="form-control" id="address" placeholder="Địa chỉ nhận hàng">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Tỉnh/ Thành phố</label>
    <input type="text" name="province" class="form-control" id="province" placeholder="Tỉnh/ Thành phố">
  </div>
    <div class="form-group">
    <label for="inputAddress">Quận/ Huyện</label>
    <input type="text" name="district" class="form-control" id="district" placeholder="Quận/ Huyện">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Phường/ Xã</label>
    <input type="text" name="ward" class="form-control" id="ward" placeholder="Phường/ Xã">
  </div>
    <div class="form-group">
        <label class="form-label mr-3">Lựa chọn tên cho địa chỉ thường dùng</label></br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="inlineRadio1" value="1">
          <label class="form-check-label" for="inlineRadio1">Văn phòng</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="inlineRadio2" value="2">
          <label class="form-check-label" for="inlineRadio2">Nhà riêng</label>
        </div>
    </div>
	<div class="row mt-3">
		<button type="button" class="btn btn-outline-dark col-md-3  ml-3" onclick="return document.getElementById('id01').style.display='none';">Huỷ</button>
		<button type="button" class="btn btn-primary col-md-3 ml-3" id="editaddress" name="editaddress">Sửa địa chỉ</button>
	</div>
  </form>
</div>
<script>
		$("button#editaddress").click(() => {

var code = $("div#id01 input#code").val(); 

var code_customer = $("div#id01 input#code_customer").val(); 

var fullname = $("div#id01 input#fullname").val(); 

var phone = $("div#id01 input#phone").val(); 

var address = $("div#id01 input#address").val(); 

var province = $("div#id01 input#province").val(); 

var district = $("div#id01 input#district").val(); 

var ward = $("div#id01 input#ward").val(); 

if($("div#id01 input#inlineRadio1").is(':checked') == 1){

var nameforaddress = 1;

$.post("ajax/customer/updateaddress.php",
{

	'code':code,          'code_customer':code_customer, 
	'fullname':fullname,  'phone':phone, 
	'address':address,    'province':province, 
	'district':district,  'ward':ward,
	'nameforaddress': nameforaddress

},function(data){
	
	$("#id01").load(window.location.href + " #id01 > *");

	alert("Sửa thành công");

	document.getElementById('id01').style.display='none'

});

} else if ($("div#id01 input#inlineRadio2").is(':checked') == 1){

var nameforaddress = 2;

$.post("ajax/customer/updateaddress.php",
{

	'code':code,          'code_customer':code_customer, 
	'fullname':fullname,  'phone':phone, 
	'address':address,    'province':province, 
	'district':district,  'ward':ward,
	'nameforaddress': nameforaddress

},function(data){
	
	$("#id01").load(window.location.href + " #id01 > *");

	alert("Sửa thành công");

	document.getElementById('id01').style.display='none'

});

}

})
</script>
<div id="id03" class="modal">
<form class="modal-content animate" action="" method="post">
  <input type="hidden" name="postaddress" id="postaddress" value="postaddress">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Full name</label>
      <input type="text" name="fullname" class="form-control" id="name-add" placeholder="Fullname">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Phone number</label>
      <input type="text" name="phone" class="form-control" id="phone-add" placeholder="Phone number">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Địa chỉ nhận hàng</label>
    <input type="text" name="adđress" class="form-control" id="addressadd" placeholder="Địa chỉ nhận hàng">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Tỉnh/ Thành phố</label>
    <input type="text" name="province" class="form-control" id="provinceadd" placeholder="Tỉnh/ Thành phố">
  </div>
    <div class="form-group">
    <label for="inputAddress">Quận/ Huyện</label>
    <input type="text" name="district" class="form-control" id="district-add" placeholder="Quận/ Huyện">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Phường/ Xã</label>
    <input type="text" name="ward" class="form-control" id="ward-add" placeholder="Phường/ Xã">
  </div>
    <div class="form-group">
        <label class="form-label mr-3">Lựa chọn tên cho địa chỉ thường dùng</label></br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="nameforaddress-add1" value="1">
          <label class="form-check-label" for="inlineRadio1">Văn phòng</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="nameforaddress" id="nameforaddress-add2" value="2">
          <label class="form-check-label" for="inlineRadio2">Nhà riêng</label>
        </div>
    </div>
	<div class="row mt-3">
		<button type="button" class="btn btn-outline-dark col-md-3  ml-3" onclick="return document.getElementById('id03').style.display='none';">Huỷ</button>
  		<button type="button" class="btn btn-primary" id="addaddress" name="addaddress">Thêm địa chỉ</button>
	</div>
	</form>
</div>

<script>
$("button#addaddress").click(() => {

var postaddress = $("div#id03 input#postaddress").val(); 

var fullname = $("div#id03 input#name-add").val(); 

var phone = $("div#id03 input#phone-add").val(); 

var address = $("div#id03 input#addressadd").val(); 

var province = $("div#id03 input#provinceadd").val(); 

var district = $("div#id03 input#district-add").val(); 

var ward = $("div#id03 input#ward-add").val(); 

if($("div#id03 input#nameforaddress-add1").is(':checked') == 1){

  var nameforaddress = 1;

  $.post("index.php?controller=profile",
  {
    'fullname':fullname,  'phone':phone, 
    'address':address,    'province':province, 
    'district':district,  'ward':ward,
    'nameforaddress': nameforaddress,
    'postaddress': postaddress
  
  },function(data){

    $("#id03").load(window.location.href + " #id03 > *");

    document.getElementById('id03').style.display='none'

  });

} else if ($("div#id03 input#nameforaddress-add2").is(':checked') == 1){

  var nameforaddress = 2;

  $.post("index.php?controller=profile",
  {
    'fullname':fullname,  'phone':phone, 
    'address':address,    'province':province, 
    'district':district,  'ward':ward,
    'nameforaddress': nameforaddress,
    'postaddress': postaddress

  },function(data){
    
    $("#id03").load(window.location.href + " #id03 > *");

    document.getElementById('id03').style.display='none'

  });

}

})
</script>